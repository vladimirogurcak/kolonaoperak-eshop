# Proposed Refactoring for _kolonaoperak-cz/functions.php

## Executive Summary
The current file has 1,728 lines with significant duplication and maintenance issues. Proposed refactoring could reduce size by ~40% while improving maintainability and performance.

---

## 1. CRITICAL BUGS (Fix Immediately)

### Bug #1: Invalid Import Statement
**Location:** Line 3
```php
// REMOVE THIS:
use function PHPSTORM_META\map;
```
**Impact:** This causes no functional issues but is incorrect - PHPSTORM_META is for IDE type hints only.

### Bug #2: PHP 8.2+ Deprecation
**Location:** Lines 1145, 1307
```php
// REPLACE:
utf8_encode($nazev)

// WITH:
mb_convert_encoding($nazev, 'UTF-8', mb_detect_encoding($nazev, ['ISO-8859-1', 'Windows-1252'], true))
```
**Impact:** Will cause deprecation warnings in PHP 8.2+ and removed in PHP 9.0.

### Bug #3: Unreachable Code
**Location:** Line 1342 in `strip_velikost_variant()`
```php
if (count($matches) == 3) {
    return trim(str_replace('cm', '', $matches[1]));
    return trim($matches[1]);  // ← DELETE THIS LINE (never executes)
}
```

---

## 2. CODE DUPLICATION (High Priority)

### Issue A: Duplicate Frame Size Functions
**Files affected:** `velikostramu()` and `velikostramubikeicon()`
**Duplication:** 95% identical code (800+ lines)

**Current:**
```php
function velikostramu($string) { /* 440 lines */ }
function velikostramubikeicon($string) { /* 400 lines */ }
```

**Proposed Solution:**
```php
class FrameSizeMapper {
    private static $sizeMap = [
        'XS' => ['XS/44', 'XS 520', '700Cx50cm(XS)', /* ... */],
        'S' => ['15', '15"', 'S, 0.000 kg', /* ... */],
        // ... rest of mappings
    ];

    private static $bikeiconExclusions = [
        'XS' => ['12', '12"', '12.5"', '13', '13"'],  // Only differences
    ];

    public static function normalize($string, $variant = 'default') {
        $string = htmlspecialchars_decode($string);

        $exclusions = ($variant === 'bikeicon')
            ? self::$bikeiconExclusions
            : [];

        foreach (self::$sizeMap as $size => $matches) {
            // Skip excluded patterns
            if (isset($exclusions[$size]) && in_array($string, $exclusions[$size])) {
                continue;
            }

            if (in_array($string, $matches, true)) {
                return $size;
            }
        }

        return $string;
    }
}

// Usage:
function velikostramu($string) {
    return FrameSizeMapper::normalize($string, 'default');
}

function velikostramubikeicon($string) {
    return FrameSizeMapper::normalize($string, 'bikeicon');
}
```

**Benefits:**
- Reduces 840 lines to ~50 lines
- Single source of truth for size mappings
- Easier to add new variants
- More testable

---

### Issue B: Duplicate Price Functions
**Functions:** `crussis_price()`, `skibike_price()`, `aspire_price()`, `schindler_price()`, `round_fix()`

**All do the same thing:**
```php
function xxx_price($price) {
    if (empty($price)) {
        error_log('Price must not be empty.');
        return '';
    }
    return round($price);
}
```

**Proposed Solution:**
```php
function normalize_price($price, $context = '') {
    if (empty($price) || !is_numeric($price)) {
        error_log(($context ? "[$context] " : '') . 'Invalid price value: ' . var_export($price, true));
        return '';
    }
    return round((float)$price);
}

// Keep vendor-specific wrappers only if needed for legacy compatibility:
function crussis_price($price) { return normalize_price($price, 'Crussis'); }
function skibike_price($price) { return normalize_price($price, 'Skibike'); }
// etc.
```

---

### Issue C: Duplicate Manufacturer Normalization
**Functions:** `aspire_manufacturer()`, `schindler_manufacturer()`, `vyrobci()`

**Proposed Solution:**
```php
class ManufacturerNormalizer {
    private static $mappings = [
        'common' => [
            'LAPIERRE E-Bikes' => 'Lapierre',
            'Ghost E-Bikes' => 'Ghost',
            'GHOST E-Bikes' => 'Ghost',
            '23 Rock Machine' => 'Rock Machine',
            '23 ROCK MACHINE' => 'Rock Machine',
            'Machina De Rocas' => 'Rock Machine',
            'MACHINA de ROCAS' => 'Rock Machine',
            'PELLS s.r.o.' => 'Pells',
            'Gt Kola A Rãmy' => 'GT',
            'GT kola a rámy' => 'GT',
            'Cannondale Kola A Rãmy' => 'Cannondale',
            'CANNONDALE kola a rámy' => 'Cannondale',
            'Cervélo' => 'Cervélo',
            'Ctm' => 'CTM Bikes',
        ],
        'aspire' => [
            'cannondale kola a rámy' => 'Cannondale',
            'gt kola a rámy' => 'GT',
        ],
        'schindler' => [
            'ghost' => 'Ghost',
            'lapierre' => 'Lapierre',
            'look' => 'Look',
            'moustache' => 'Moustache',
            'norco' => 'Norco',
            'pells' => 'Pells',
            'stevens' => 'Stevens',
        ],
    ];

    public static function normalize($manufacturer, $source = 'common') {
        if (empty($manufacturer)) {
            error_log("[$source] Manufacturer name must not be empty.");
            return '';
        }

        $normalized = trim($manufacturer);
        $mapping = self::$mappings[$source] ?? self::$mappings['common'];

        // Try exact match first
        if (isset($mapping[$normalized])) {
            return $mapping[$normalized];
        }

        // Try case-insensitive match
        $lowerKey = strtolower($normalized);
        foreach ($mapping as $key => $value) {
            if (strtolower($key) === $lowerKey) {
                return $value;
            }
        }

        // For 'common' source, apply title case
        if ($source === 'common') {
            if (mb_detect_encoding($normalized) === 'UTF-8') {
                $normalized = mb_convert_case(
                    mb_convert_encoding($normalized, 'UTF-8', mb_detect_encoding($normalized, ['ISO-8859-1', 'Windows-1252'], true)),
                    MB_CASE_TITLE,
                    'UTF-8'
                );
            } else {
                $normalized = mb_convert_case($normalized, MB_CASE_TITLE, 'UTF-8');
            }
        }

        return $normalized;
    }
}

// Wrapper functions for compatibility
function vyrobci($string) {
    return ManufacturerNormalizer::normalize($string, 'common');
}

function aspire_manufacturer($manufacturer) {
    return ManufacturerNormalizer::normalize($manufacturer, 'aspire');
}

function schindler_manufacturer($manufacturer) {
    return ManufacturerNormalizer::normalize($manufacturer, 'schindler');
}
```

---

## 3. CODE QUALITY IMPROVEMENTS

### Issue A: Inconsistent String Matching
**Current:** Mix of `str_contains()`, `strpos()`, pattern matching

**Recommendation:** Standardize on PHP 8+ `str_contains()` for readability:
```php
// OLD (multiple styles):
if (strpos($string, 'horská') !== false) { }
if (str_contains($string, 'lektro')) { }

// NEW (consistent):
if (str_contains($string, 'horská')) { }
if (str_contains($string, 'lektro')) { }
```

### Issue B: Missing Type Hints
**Current:**
```php
function velikostramu($string) { /* ... */ }
```

**Proposed:**
```php
function velikostramu(?string $string): string {
    if ($string === null || $string === '') {
        return '';
    }
    // ... rest of logic
}
```

### Issue C: Magic Strings Everywhere
**Current:** Category/type names hardcoded throughout

**Proposed:**
```php
class BikeCategories {
    public const ELEKTROKOLA = 'Elektrokola';
    public const JIZDNI_KOLA = 'Jízdní kola';
    public const HORSKA_KOLA = 'Horská kola';
    public const SILNICNI_KOLA = 'Silniční kola';
    public const MESTSKA_KOLA = 'Městská kola';
    public const GRAVEL_KOLA = 'Gravel a cyklokrosová kola';
    public const TREKOVA_KOLA = 'Treková kola';
    public const ELEKTROKOLOBEZKY = 'Elektrokoloběžky';
}

// Usage:
function kategorielsc($string) {
    $string = mb_strtolower($string);

    if (str_contains($string, 'e-tour') ||
        str_contains($string, 'elektrokola') ||
        str_contains($string, 'e-urban') ||
        str_contains($string, 'e-mtb')) {
        return BikeCategories::ELEKTROKOLA;
    }

    return BikeCategories::JIZDNI_KOLA;
}
```

---

## 4. PERFORMANCE IMPROVEMENTS

### Issue A: Inefficient Loop in Size Mapping
**Current:**
```php
foreach ($data as $size => $matches) {
    foreach ($matches as $match) {
        if ($match === $string) {
            $string = $size;
            break 2;
        }
    }
}
```

**Proposed:** Use reverse lookup array
```php
class FrameSizeMapper {
    private static $reverseLookup = null;

    private static function buildReverseLookup() {
        if (self::$reverseLookup !== null) {
            return;
        }

        self::$reverseLookup = [];
        foreach (self::$sizeMap as $size => $matches) {
            foreach ($matches as $match) {
                self::$reverseLookup[$match] = $size;
            }
        }
    }

    public static function normalize($string, $variant = 'default') {
        self::buildReverseLookup();
        $string = htmlspecialchars_decode($string);

        return self::$reverseLookup[$string] ?? $string;
    }
}
```
**Performance gain:** O(n²) → O(1) lookup

---

## 5. SECURITY CONSIDERATIONS

### Issue A: Unsafe Deserialization Risk
**Location:** `location()` function, line 1251
```php
return maybe_serialize(array(/* ... */));
```

**Recommendation:**
- If this is for WordPress, `maybe_serialize()` is generally safe
- Add validation before serializing user input:
```php
function location($lng, $lat, $address, $postal, $city) {
    // Validate coordinates
    if (!is_numeric($lng) || !is_numeric($lat)) {
        error_log('Invalid coordinates provided');
        return '';
    }

    // Sanitize text inputs
    $address = sanitize_text_field($address);
    $postal = sanitize_text_field($postal);
    $city = sanitize_text_field($city);

    // ... rest of function
}
```

### Issue B: htmlspecialchars_decode Without Context
**Location:** Multiple functions
```php
$string = htmlspecialchars_decode($string);
```

**Recommendation:** Only decode when necessary, document why:
```php
// Decode HTML entities from feed data before comparison
$string = htmlspecialchars_decode($string, ENT_QUOTES | ENT_HTML5);
```

---

## 6. MAINTAINABILITY IMPROVEMENTS

### Recommendation A: Split Into Multiple Files
**Proposed structure:**
```
functions/
├── frame-sizes.php          # FrameSizeMapper class
├── manufacturers.php        # ManufacturerNormalizer class
├── categories.php           # BikeCategories class + category functions
├── price-helpers.php        # Price normalization functions
├── vendor-ctm.php           # CTM-specific functions
├── vendor-crussis.php       # Crussis-specific functions
├── vendor-skibike.php       # Skibike-specific functions
├── vendor-aspire.php        # Aspire-specific functions
├── vendor-schindler.php     # Schindler & Bikeicon functions
└── helpers.php              # Misc utility functions
```

### Recommendation B: Add PHPDoc Comments
**Example:**
```php
/**
 * Normalizes bike frame size variants to standard sizes (XS, S, M, L, XL, XXL)
 *
 * Handles various input formats:
 * - T-shirt sizes: "S", "M/52", "L (29")"
 * - Numeric sizes: "15", "17", "540mm"
 * - Vendor-specific codes: "S1", "S2", "S3"
 *
 * @param string|null $string Frame size string from product feed
 * @return string Normalized size or original if no mapping found
 *
 * @example velikostramu('M/17.5') // Returns: 'M'
 * @example velikostramu('29x17.5"(M)') // Returns: 'M'
 */
function velikostramu(?string $string): string {
    return FrameSizeMapper::normalize($string, 'default');
}
```

### Recommendation C: Add Unit Tests
**Example test structure:**
```php
// tests/FrameSizeMapperTest.php
class FrameSizeMapperTest extends PHPUnit\Framework\TestCase {
    public function testNormalizesStandardSizes() {
        $this->assertEquals('M', FrameSizeMapper::normalize('M/17'));
        $this->assertEquals('M', FrameSizeMapper::normalize('29x17.5"(M)'));
        $this->assertEquals('L', FrameSizeMapper::normalize('L/19'));
    }

    public function testReturnsOriginalForUnknownSizes() {
        $this->assertEquals('CUSTOM', FrameSizeMapper::normalize('CUSTOM'));
    }

    public function testHandlesEmptyInput() {
        $this->assertEquals('', FrameSizeMapper::normalize(''));
        $this->assertEquals('', FrameSizeMapper::normalize(null));
    }
}
```

---

## 7. MIGRATION STRATEGY

### Phase 1: Fix Critical Bugs (1-2 hours)
1. Remove invalid import statement
2. Fix `utf8_encode()` deprecation
3. Remove dead code in `strip_velikost_variant()`
4. Test on staging environment

### Phase 2: Extract Classes (4-6 hours)
1. Create `FrameSizeMapper` class
2. Create `ManufacturerNormalizer` class
3. Create `BikeCategories` constants class
4. Keep wrapper functions for backward compatibility
5. Test all WP All Import mappings

### Phase 3: Refactor Vendor Functions (2-4 hours)
1. Consolidate price functions
2. Standardize title/name cleaning functions
3. Add type hints
4. Add PHPDoc comments

### Phase 4: Add Tests (4-8 hours)
1. Set up PHPUnit
2. Write tests for critical functions
3. Achieve >80% code coverage

### Phase 5: Split Files (2-3 hours)
1. Split into logical files (see structure above)
2. Create autoloader or require_once chain
3. Update deployment script

---

## 8. ESTIMATED IMPACT

| Metric | Current | After Refactoring | Improvement |
|--------|---------|-------------------|-------------|
| Total Lines | 1,728 | ~1,000 | -42% |
| Duplicate Code | ~850 lines | <50 lines | -94% |
| Function Count | 46 | ~35 + 3 classes | Better organized |
| Maintainability Index | Low | High | ✓ |
| Test Coverage | 0% | 80%+ | ✓ |
| PHP 8.2+ Compatible | ⚠️ Warnings | ✓ Yes | ✓ |

---

## 9. BACKWARD COMPATIBILITY

All existing function signatures will remain unchanged. Refactored code will use new classes internally but maintain the same external API:

```php
// This will still work exactly as before:
$size = velikostramu('M/17.5');  // Returns: 'M'
$manufacturer = vyrobci('CANNONDALE kola a rámy');  // Returns: 'Cannondale'
$category = kategorielsc('elektrokola');  // Returns: 'Elektrokola'
```

No changes required in WP All Import configurations.

---

## 10. NEXT STEPS

**Immediate actions:**
1. Create backup of current functions.php
2. Set up test/staging environment
3. Fix critical bugs (Phase 1)
4. Deploy and test

**Short-term (1-2 weeks):**
1. Implement class-based refactoring (Phase 2)
2. Add comprehensive tests (Phase 4)

**Long-term (1-2 months):**
1. Complete vendor function consolidation (Phase 3)
2. Split into multiple files (Phase 5)
3. Document all functions
4. Set up CI/CD for automated testing

---

## Questions?
- Which vendors are actively used? (Can we deprecate old ones?)
- Is there a staging/test environment available?
- What's the PHP version on production? (Important for `str_contains()` usage)
- Are there automated tests currently?
- What's the WP All Import version being used?
