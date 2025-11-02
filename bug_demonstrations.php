<?php
/**
 * Demonstrates the bugs found in _kolonaoperak-cz/functions.php
 * Run this to see the issues in action
 */

echo "Bug Demonstrations from _kolonaoperak-cz/functions.php\n";
echo str_repeat('=', 70) . "\n\n";

// ============================================================================
// BUG #1: Invalid Import Statement (Line 3)
// ============================================================================
echo "BUG #1: Invalid Import Statement\n";
echo str_repeat('-', 70) . "\n";
echo "Current code:\n";
echo "  use function PHPSTORM_META\\map;\n\n";
echo "Issue:\n";
echo "  - PHPSTORM_META is for IDE type hints only\n";
echo "  - Should not be in production code\n";
echo "  - 'map' function doesn't exist in this namespace\n\n";
echo "Fix:\n";
echo "  - Simply remove this line\n\n";

// ============================================================================
// BUG #2: PHP 8.2+ Deprecation Warning
// ============================================================================
echo "BUG #2: utf8_encode() Deprecation (PHP 8.2+)\n";
echo str_repeat('-', 70) . "\n";

// Show the issue
if (PHP_VERSION_ID >= 80200) {
    echo "⚠️  You're running PHP " . PHP_VERSION . " - utf8_encode() is DEPRECATED!\n\n";
} else {
    echo "ℹ️  You're running PHP " . PHP_VERSION . " (utf8_encode still works)\n";
    echo "   BUT it will break in PHP 8.2+!\n\n";
}

echo "Current code (lines 1145, 1307):\n";
echo "  \$nazev = mb_convert_case(utf8_encode(\$nazev), MB_CASE_TITLE, 'UTF-8');\n\n";

echo "Problem:\n";
echo "  - utf8_encode() deprecated in PHP 8.2 (2022)\n";
echo "  - Will be REMOVED in PHP 9.0\n";
echo "  - utf8_encode() assumes ISO-8859-1 input (often wrong)\n\n";

echo "Correct replacement:\n";
echo "  if (!mb_check_encoding(\$nazev, 'UTF-8')) {\n";
echo "      \$nazev = mb_convert_encoding(\$nazev, 'UTF-8', mb_detect_encoding(\$nazev));\n";
echo "  }\n";
echo "  \$nazev = mb_convert_case(\$nazev, MB_CASE_TITLE, 'UTF-8');\n\n";

// Demonstrate the difference
$testStrings = [
    'cannondale lefty' => 'ISO-8859-1',
    'Cervélo R5' => 'UTF-8',
    'Kóla Špičková' => 'UTF-8',
];

echo "Example with actual data:\n";
foreach ($testStrings as $string => $encoding) {
    echo "  Input: '{$string}' ({$encoding})\n";

    // Old way (deprecated)
    if (PHP_VERSION_ID < 80200) {
        $oldWay = @utf8_encode($string);
        echo "    Old way (utf8_encode): '{$oldWay}'\n";
    } else {
        echo "    Old way (utf8_encode): DEPRECATED - Can't run\n";
    }

    // New way
    if (!mb_check_encoding($string, 'UTF-8')) {
        $newWay = mb_convert_encoding($string, 'UTF-8', mb_detect_encoding($string, ['ISO-8859-1', 'Windows-1252', 'UTF-8'], true));
    } else {
        $newWay = $string;
    }
    $newWay = mb_convert_case($newWay, MB_CASE_TITLE, 'UTF-8');
    echo "    New way (mb_convert_encoding): '{$newWay}'\n";
    echo "\n";
}

// ============================================================================
// BUG #3: Unreachable Code (Dead Code)
// ============================================================================
echo "\nBUG #3: Dead Code in strip_velikost_variant()\n";
echo str_repeat('-', 70) . "\n";
echo "Current code (lines 1339-1345):\n";
echo "  function strip_velikost_variant(\$productname = '') {\n";
echo "      preg_match('/(.*)Velikost: (.*)/', \$productname, \$matches);\n";
echo "      if (count(\$matches) == 3) {\n";
echo "          return trim(str_replace('cm', '', \$matches[1]));  // <-- Returns here\n";
echo "          return trim(\$matches[1]);  // <-- ❌ NEVER EXECUTES!\n";
echo "      }\n";
echo "      return \$productname;\n";
echo "  }\n\n";

echo "Issue:\n";
echo "  - Second return statement on line 1342 is unreachable\n";
echo "  - Code after 'return' never executes\n";
echo "  - Suggests incomplete refactoring or copy-paste error\n\n";

echo "Fix:\n";
echo "  - Remove line 1342 (the duplicate return statement)\n\n";

// Demonstrate with actual function
function strip_velikost_variant_OLD($productname = '') {
    preg_match('/(.*)Velikost: (.*)/', $productname, $matches);
    if (count($matches) == 3) {
        echo "    [DEBUG] First return will execute\n";
        return trim(str_replace('cm', '', $matches[1]));
        echo "    [DEBUG] This echo will NEVER show (unreachable)\n";  // Simulating the bug
        return trim($matches[1]);  // This never executes
    }
    return $productname;
}

function strip_velikost_variant_FIXED($productname = '') {
    preg_match('/(.*)Velikost: (.*)/', $productname, $matches);
    if (count($matches) == 3) {
        return trim(str_replace('cm', '', $matches[1]));
    }
    return $productname;
}

echo "Test with: 'Scott Scale 970 Velikost: 54cm'\n";
$test = 'Scott Scale 970 Velikost: 54cm';
$result = strip_velikost_variant_OLD($test);
echo "  Result: '{$result}'\n";
echo "  (Notice the debug message never appeared after first return)\n\n";

// ============================================================================
// PERFORMANCE ISSUE: Nested Loop vs Hash Lookup
// ============================================================================
echo "\nPERFORMANCE ISSUE: Inefficient Size Mapping\n";
echo str_repeat('=', 70) . "\n";
echo "Current approach in velikostramu():\n";
echo "  foreach (\$data as \$size => \$matches) {        // O(n)\n";
echo "      foreach (\$matches as \$match) {             // O(m)\n";
echo "          if (\$match === \$string) {              // Total: O(n*m)\n";
echo "              \$string = \$size;\n";
echo "              break 2;\n";
echo "          }\n";
echo "      }\n";
echo "  }\n\n";

echo "With ~50 size categories and ~20 patterns each:\n";
echo "  - Worst case: 50 × 20 = 1,000 comparisons per lookup\n";
echo "  - Average case: ~500 comparisons\n\n";

echo "Better approach with reverse lookup (O(1)):\n";
echo "  \$reverseLookup = [\n";
echo "      'M/17.5' => 'M',\n";
echo "      '29x17.5\"(M)' => 'M',\n";
echo "      // ... build once at startup\n";
echo "  ];\n";
echo "  return \$reverseLookup[\$string] ?? \$string;  // O(1) - instant lookup\n\n";

// Demonstrate performance difference
$sizeData = [
    'XS' => ['12"', '13"', '14"', 'XS/15'],
    'S' => ['15"', 'S/16', 'S/17', '540mm'],
    'M' => ['16"', '17"', 'M/17.5', 'M/18', '560mm'],
    'L' => ['18"', '19"', 'L/19', 'L/20', '580mm'],
    'XL' => ['20"', '21"', 'XL/21', 'XL/22', '600mm'],
];

// Old way (nested loop)
function lookupOldWay($string, $data) {
    foreach ($data as $size => $matches) {
        foreach ($matches as $match) {
            if ($match === $string) {
                return $size;
            }
        }
    }
    return $string;
}

// New way (hash lookup)
$reverseLookup = [];
foreach ($sizeData as $size => $patterns) {
    foreach ($patterns as $pattern) {
        $reverseLookup[$pattern] = $size;
    }
}

function lookupNewWay($string, $lookup) {
    return $lookup[$string] ?? $string;
}

// Benchmark
$testInput = 'XL/21';
$iterations = 100000;

echo "Performance test ({$iterations} lookups of '{$testInput}'):\n\n";

$start = microtime(true);
for ($i = 0; $i < $iterations; $i++) {
    lookupOldWay($testInput, $sizeData);
}
$timeOld = microtime(true) - $start;

$start = microtime(true);
for ($i = 0; $i < $iterations; $i++) {
    lookupNewWay($testInput, $reverseLookup);
}
$timeNew = microtime(true) - $start;

$speedup = $timeOld / $timeNew;

echo "  Old way (nested loop): " . number_format($timeOld, 4) . " seconds\n";
echo "  New way (hash lookup): " . number_format($timeNew, 4) . " seconds\n";
echo "  Speedup: " . number_format($speedup, 1) . "x faster! 🚀\n\n";

echo "Note: With the actual data (50 categories × 20 patterns), \n";
echo "      the speedup would be even more dramatic.\n\n";

// ============================================================================
// SUMMARY
// ============================================================================
echo "\nSUMMARY\n";
echo str_repeat('=', 70) . "\n";
echo "Critical bugs found:\n";
echo "  1. ✗ Invalid import statement (line 3)\n";
echo "  2. ✗ PHP 8.2+ deprecation warnings (lines 1145, 1307)\n";
echo "  3. ✗ Dead code / unreachable statement (line 1342)\n\n";

echo "Major issues:\n";
echo "  • 840 lines of duplicate code (velikostramu vs velikostramubikeicon)\n";
echo "  • Inefficient O(n*m) algorithms where O(1) is possible\n";
echo "  • 5 identical price-rounding functions\n";
echo "  • No type hints, no documentation\n";
echo "  • Magic strings everywhere\n\n";

echo "Recommended actions:\n";
echo "  1. Fix critical bugs immediately (30 min)\n";
echo "  2. Refactor size mapping to class-based approach (4 hours)\n";
echo "  3. Consolidate duplicate functions (2 hours)\n";
echo "  4. Add type hints and documentation (2 hours)\n";
echo "  5. Add unit tests (4 hours)\n\n";

echo "See 'proposed_refactoring.md' for detailed recommendations.\n";
echo "See 'example_refactored_class.php' for working example code.\n";
