<?php

function velikostramu($string)
{
  $data = array(
  
  );

  $string = htmlspecialchars_decode($string);

  foreach ($data as $size => $matches) {
    foreach ($matches as $match) {
      if ($match === $string) {
        $string = $size;
        break 2;
      }
    }
  }

  return $string;
}

function prislusenstvi( $string ) {
    $string = mb_strtolower( $string );
    $prislusenstvi = '';
    if ( str_contains( $string, 'blikačka přední' ) ) {
        $prislusenstvi = 'Blikačky a svetlá';
    } elseif ( str_contains( $string, 'blikačka zadní' ) ) {
        $prislusenstvi = 'Blikačky a svetlá';
    } elseif ( str_contains( $string, 'sada blikaček' ) ) {
        $prislusenstvi = 'Blikačky a svetlá';
    } elseif ( str_contains( $string, 'světlo přední' ) ) {
        $prislusenstvi = 'Blikačky a svetlá';
    } elseif ( str_contains( $string, 'brašna podsedlová' ) ) {
        $prislusenstvi = 'Tašky';
    } elseif ( str_contains( $string, 'cyklo láhve' ) ) {
        $prislusenstvi = 'Flaše';
    } elseif ( str_contains( $string, 'tachometry bezdrátové' ) ) {
        $prislusenstvi = 'Počítače a tachometre';
    } elseif ( str_contains( $string, 'košíky na láhve' ) ) {
        $prislusenstvi = 'Košíky na flaše';
    } elseif ( str_contains( $string, 'pump' ) ) {
        $prislusenstvi = 'Pumpy a pumpičky';
    } elseif ( str_contains( $string, 'bezdušový systém' ) ) {
        $prislusenstvi = 'Bezdušový systém';
    } elseif ( str_contains( $string, 'pedály' ) ) {
        $prislusenstvi = 'Pedále';
    } elseif ( str_contains( $string, 'ámky' ) ) {
        $prislusenstvi = 'Zámky';
    }

    return ( !empty( $prislusenstvi ) ) ? 'Príslušenstvo | ' . $prislusenstvi : '';

}

function kategoriesk( $string ) {
    $string = mb_strtolower( $string );
    $kategorie = '';
    if ( str_contains( $string, 'lektrobicykle' ) ) {
        $kategorie = 'Elektrobicykle';
    } elseif ( str_contains( $string, 'icykle' ) ) {
        $kategorie = 'Bicykle';
    }
    return ( !empty( $kategorie ) ) ? 'Typ | ' . $kategorie : '';

}

function kategorieskBelda( $string ) {
    $string = mb_strtolower( $string );
    $kategorie = '';
    if ( str_contains( $string, 'elektro bicykle' ) ) {
        $kategorie = 'Elektrobicykle';
    } elseif ( str_contains( $string, 'icykle' ) ) {
        $kategorie = 'Bicykle';
    }
    return ( !empty( $kategorie ) ) ? 'Typ | ' . $kategorie : '';

}

function kategorievelosport( $string ) {
    $string = mb_strtolower( $string );
    $kategorie = '';
    if ( str_contains( $string, 'elektrobicykle' ) ) {
        $kategorie = 'Elektrobicykle';
    } elseif ( str_contains( $string, 'bicykle' ) ) {
        $kategorie = 'Bicykle';
    }
    return ( !empty( $kategorie ) ) ? 'Typ | ' . $kategorie : '';

}


function druhsk( $string ) {
    $string = mb_strtolower( $string );
    $kategorie = '';
    if ( str_contains( $string, 'ravelové' ) ) {
        $kategorie = 'Gravel a cyklokrosové bicykle';
    } elseif ( str_contains( $string, 'rosové' ) ) {
        $kategorie = 'Gravel a cyklokrosové bicykle';
    } elseif ( str_contains( $string, 'orské' ) ) {
        $kategorie = 'Horské bicykle';
    } elseif ( str_contains( $string, 'estské' ) ) {
        $kategorie = 'Mestské bicykle';
    } elseif ( str_contains( $string, 'estné' ) ) {
        $kategorie = 'Cestné bicykle';
    }

    return ( !empty( $kategorie ) ) ? 'Druh | ' . $kategorie : '';

}

function druhvelosport( $string ) {
    $string = mb_strtolower( $string );
    $kategorie = '';
    if ( str_contains( $string, 'cyklokrosové' ) ) {
        $kategorie = 'Gravel a cyklokrosové bicykle';
    } elseif ( str_contains( $string, 'trekking' ) ) {
        $kategorie = 'Gravel a cyklokrosové bicykle';
    } elseif ( str_contains( $string, 'gravel' ) ) {
        $kategorie = 'Gravel a cyklokrosové bicykle';
    } elseif ( str_contains( $string, 'kosové' ) ) {
        $kategorie = 'Gravel a cyklokrosové bicykle';
    } elseif ( str_contains( $string, 'horské' ) ) {
        $kategorie = 'Horské bicykle';
    } elseif ( str_contains( $string, 'downhill' ) ) {
        $kategorie = 'Horské bicykle';
    } elseif ( str_contains( $string, 'dirt' ) ) {
        $kategorie = 'Horské bicykle';
    } elseif ( str_contains( $string, 'mestské' ) ) {
        $kategorie = 'Mestské bicykle';
    } elseif ( str_contains( $string, 'cestné' ) ) {
        $kategorie = 'Cestné bicykle';
    }

    return ( !empty( $kategorie ) ) ? 'Druh | ' . $kategorie : '';

}

function velikost( $velikost ) {
    $velikost = ( array )explode( '/', $velikost );
    return trim( str_replace( array( '"', ',', '&quot;' ), array( '', '.', '' ), $velikost[ 0 ] ) );
}

function offset( $int ) {
    return ( int )$int + 1;
}

function round_with_kurz( $price, $mena = 'EUR' ) {
  return round( $price / get_cnb_kurz( $mena ) );
}

function oprava_kurz( $price ) {
  return round( $price / oprava_get_cnb_eur( $last_number ) );
}

function round_fix( $price ) {
    return round( ( int )$price );
}

function dph_eur_fix( $price ) {
    return round( $price / 1.2 );
}


function nazev_lbs_sport( $nazev, $typ = 'ean' ) {
    $nazev = explode( '-', $nazev );
    if ( is_array( $nazev ) && count( $nazev ) == 2 )
        return ( $typ === 'ean' ) ? trim( $nazev[ 1 ] ) : trim( $nazev[ 0 ] );
    else
        return $nazev;
}

function nazev( $nazev ) {
    $nazev = rtrim( $nazev, ' Velikost: 38' );
    $nazev = rtrim( $nazev, ' Velikost: 40' );
    $nazev = rtrim( $nazev, ' Velikost: 43' );
    $nazev = rtrim( $nazev, ' Velikost: 44' );
    $nazev = rtrim( $nazev, ' Velikost: 48' );
    $nazev = rtrim( $nazev, ' Velikost: 49' );
    $nazev = rtrim( $nazev, ' Velikost: 51' );
    $nazev = rtrim( $nazev, ' Velikost: 53' );
    $nazev = rtrim( $nazev, ' Velikost: 54' );
    $nazev = rtrim( $nazev, ' Velikost: 57' );
    $nazev = rtrim( $nazev, ' Velikost: L' );
    $nazev = rtrim( $nazev, '- S' );
    $nazev = rtrim( $nazev, '- M' );
    $nazev = rtrim( $nazev, '- L' );
    $nazev = rtrim( $nazev, '- XS' );
    $nazev = rtrim( $nazev, '- XL' );
    $nazev = rtrim( $nazev, ' S' );
    $nazev = rtrim( $nazev, ' M' );
    $nazev = rtrim( $nazev, ' L' );
    $nazev = rtrim( $nazev, ' XS' );
    $nazev = rtrim( $nazev, ' XL' );
    $nazev = rtrim( $nazev, ' 44' );
    $nazev = rtrim( $nazev, ' 49' );
    $nazev = rtrim( $nazev, ' 54' );
    return trim( $nazev );
}

function odpruzeni( $desc ) {
    if ( strpos( $desc, 'odpružený' ) !== false ) {
        return 'Celoodpružená';
    }
}

function heureka_sklad( $delivery ) {
    return ( is_numeric( $delivery ) && $delivery < 32 ) ? 'instock' : 'outofstock';
}

function heureka_kategorie_kola( $category ) {
    if ( empty( $category ) )
        return '';

    $category = mb_strtolower( end( explode( '|', $category ) ) );

    if ( strpos( $category, 'horská' ) !== false ) {
        $category = 'Horské';
    }
    if ( strpos( $category, 'silniční' ) !== false ) {
        $category = 'Cestné';
    }
    if ( strpos( $category, 'městská' ) !== false ) {
        $category = 'Mestské';
    }
    if ( strpos( $category, 'treková' ) !== false || strpos( $category, 'cross' ) !== false || strpos( $category, 'treking' ) !== false ) {
        $category = 'Crossové a Trekové';
    }
    if ( strpos( $category, 'dámská' ) !== false ) {
        $category = 'Dámské';
    }
    if ( strpos( $category, 'dětská' ) !== false ) {
        $category = 'Detské';
    }
    if ( strpos( $category, 'elektrokola' ) !== false ) {
        $category = 'Elektrobicykle';
    }
    if ( strpos( $category, 'jízdní kola' ) !== false ) {
        $category = 'Bicykle';
    }
    return $category;
}

function location( $lng, $lat, $address, $postal, $city ) {
    return maybe_serialize( array(
        'lat' => $lat,
        'lng' => $lng,
        'zoom' => 12,
        'markers' => array( array(
            'label' => $address . ', ' . $postal . ' ' . $city,
            'default_label' => $address . ', ' . $postal . ' ' . $city,
            'lat' => $lat,
            'lng' => $lng,
        ) ),
        'address' => $address . ', ' . $postal . ' ' . $city,
        'layers' => array( 'OpenStreetMap.Mapnik' ),
        'version' => '1.3.2'
    ) );
}

function vyrobci( $string ) {

    $string = str_replace(
        array(
            'LAPIERRE E-Bikes',
            'Ghost E-Bikes',
            'GHOST E-Bikes',
            '23 Rock Machine',
            '23 ROCK MACHINE',
            'PELLS s.r.o.',
            'Gt Kola A Rã¡My',
            'GT kola a rámy',
            'Cannondale Kola A Rã¡My',
            'CANNONDALE kola a rámy'

        ), array(
            'Lapierre',
            'Ghost',
            'Ghost',
            'Rock Machine',
            'Rock Machine',
            'Pells',
            'GT',
            'GT',
            'Cannondale',
            'Cannondale'
        ), $string );

    if ( mb_detect_encoding( $string ) === 'UTF-8' ) {
        $string = mb_convert_case( utf8_encode( $string ), MB_CASE_TITLE, 'UTF-8' );
    } else {
        $string = mb_convert_case( $string, MB_CASE_TITLE, 'UTF-8' );
    }

    return $string;
}

function rok_vyroby( $rok ) {
    return ( empty( $rok ) ) ? '2021' : $rok;
}

function ean_or_itemid( $ean = '', $itemid = '' ) {
    return ( !empty( $ean ) ) ? $ean : $itemid;
}

function get_bracket_variant( $productname = '' ) {
    preg_match( '/.*\(([^)]*)\)/', $productname, $matches );
    if ( count( $matches ) == 2 ) {
        return trim( str_replace( '(' . $matches[ 1 ] . ')', '(UNI)', $productname ) );
    }
    return $productname;
}

function strip_velikost_variant( $productname = '' ) {
    preg_match( '/(.*)Veľkosť: (.*cm)/', $productname, $matches );
    if ( count( $matches ) == 3 ) {
        return trim( $matches[ 1 ] );
    }
    return $productname;
}

function get_velikost_from_title( $productname = '' ) {
    preg_match( '/(.*)Veľkosť: (.*cm)/', $productname, $matches );
    if ( count( $matches ) == 3 ) {
        return trim( str_replace( 'cm', '', $matches[ 2 ] ) );
    }
    return $productname;
}


function check_price($avail) {
    $price = str_replace(",",".",$avail);
        return $price;
}

// ctm bikes
function ctm_title($model, $color)
{
    // Validate inputs
    if (empty($model) || empty($color)) {
        error_log('Model and color must not be empty.');
        return '';
    }

    // Process model and trim color
    $ctm_model = ctm_model($model);
    $ctm_color = trim($color);

    // Return formatted title
    return $ctm_model . " - " . $ctm_color;
}

function ctm_model($model)
{
    // Validate inputs
    if (empty($model)) {
        error_log('Model must not be empty.');
        return '';
    }

    // Remove trailing and leading whitespace first
    $ctm_model = trim($model);

    // Simply remove the inch symbol (quote mark)
    $ctm_model = str_replace('"', '', $ctm_model);

    // Clean up any extra whitespace and trim
    $ctm_model = preg_replace('/\s+/', ' ', $ctm_model);

    return trim($ctm_model);
}

function ctm_price($regular_price, $sale_price)
{
    //validate inputs
    if (empty($regular_price)) {
        error_log('Regular price must not be empty.');
        return '';
    }

    // validate sale price and empty it if it's 0
    $ctm_sale_price = ctm_sale_price($sale_price);

    $ctm_price = empty($ctm_sale_price)? $regular_price : $ctm_sale_price;

    return round($ctm_price);
}

function ctm_sale_price($sale_price)
{
    return $sale_price == 0 ? '' : $sale_price;
}

function ctm_bike_type($bike_type)
{
    if (empty($bike_type)) {
        error_log('Bike type must not be empty.');
        return ''; // uncategorized
    }

    // Remove trailing and leading whitespace first
    $bike_type = trim($bike_type);

    // Convert to lowercase
    $bike_type = mb_strtolower($bike_type);

    switch ($bike_type) {
        case 'e-bike':
            return 'Elektrobicykle';
        default:
            return 'Bicykle';
    }
}

// crussis
function crussis_price($price)
{
    //validate inputs
    if (empty($price)) {
        error_log('Price must not be empty.');
        return '';
    }

    $crussis_price = round($price);

    return $crussis_price;
}

function crussis_frame_size($frame_size)
{
    if (empty($frame_size)) {
        error_log('Frame size must not be empty.');
        return '';
    }

    // Remove trailing and leading whitespace first
    $frame_size = trim($frame_size);

    // trim inches symbol
    $frame_size = trim($frame_size, '"');

    // add inches symbol
    $frame_size = $frame_size . '"';

    return $frame_size;
}

function crussis_bike_type()
{
    return 'Elektrobicykle';
}

// Skibike
function skibike_frame_size($frame_size)
{        
    // Return null for invalid/empty sizes
    if (empty($frame_size)) {
        error_log('Frame size must not be empty.');
        return '';
    }

    // Remove extra whitespace and convert to uppercase for consistency
    $frame_size = trim(strtoupper($frame_size));

    // Remove wheel size if present (e.g., "M (29)" -> "M")
    $frame_size = preg_replace('/\s*\([^)]+\)/', '', $frame_size);
    $frame_size = trim($frame_size);

    // Map common t-shirt size variations to standard sizes
    $sizeMap = [
        'XS' => 'XS',
        'S' => 'S',
        'S1' => 'S1',
        'S2' => 'S2',
        'S3' => 'S3',
        'S4' => 'S4',
        'S5' => 'S5',
        'M' => 'M',
        'MD' => 'M',
        'ML' => 'ML',
        'M/L' => 'ML',
        'L' => 'L',
        'LG' => 'L',
        'XL' => 'XL',
        'XXL' => 'XXL',
    ];

    // Check if it's a t-shirt size (with or without variations)
    if (isset($sizeMap[$frame_size])) {
        return $sizeMap[$frame_size];
    }
    // Check if it's a numerical size (48-64 range typical for bikes)
    elseif (is_numeric($frame_size)) {
        return $frame_size;
    }
    // Unknown format, return as-is
    else {
        return $frame_size;
    }
}

function skibike_price($price)
{
    //validate inputs
    if (empty($price)) {
        error_log('Price must not be empty.');
        return '';
    }

    $skibike_price = round($price);

    return $skibike_price;
}

function skibike_bike_type($bike_type)
{
    if (empty($bike_type)) {
        error_log('Bike type must not be empty.');
        return '';
    }

    $skibike_bike_type = trim($bike_type);

    // Convert to lowercase
    $skibike_bike_type = mb_strtolower($skibike_bike_type);

    return str_contains($skibike_bike_type, 'elektro') ? 'Elektrobicykle' : 'Bicykle';
}

// Aspire
function aspire_title($product_name, $color = '')
{
    // Validate inputs
    if (empty($product_name) || empty($color)) {
        error_log('Product name and color must not be empty.');
        return '';
    }

    // Clean up (sku/size) pattern
    $aspire_product_name = preg_replace('/\(.*$/', '', $product_name);

    // Clean up any extra whitespace and trim
    $aspire_product_name = preg_replace('/\s+/', ' ', $aspire_product_name);

    // Remove trailing and leading whitespace first
    $aspire_product_name = trim($aspire_product_name);
    $aspire_color = trim($color);

    return $aspire_color
    ? $aspire_product_name . " - " . $aspire_color
    : $aspire_product_name;
}

function aspire_price($price)
{
    //validate inputs
    if (empty($price)) {
        error_log('Price must not be empty.');
        return '';
    }

    $crussis_price = round($price);

    return $crussis_price;
}

function aspire_bike_type($category, $engine)
{
    if (empty($category)) {
        error_log('Catregory must not be empty.');
        return '';
    }

    // Remove trailing and leading whitespace first
    $category = trim($category);

    // Convert to lowercase
    $category = mb_strtolower($category);

    // Has engine
    $has_engine = !empty($engine);

    // Category contains "elektrokola"
    $contains_elektrokola = str_contains($category, 'elektrokola');

    return $contains_elektrokola || $has_engine ? 'Elektrobicykle' : 'Bicykle';
}

function aspire_manufacturer($manufacturer)
{
    // Validate inputs
    if (empty($manufacturer)) {
        error_log('Manufacturer name must not be empty.');
        return '';
    }

    // Remove trailing and leading whitespace first
    $manufacturer = trim($manufacturer);

    // Convert to lowercase
    $manufacturer = strtolower($manufacturer);

    switch ($manufacturer) {
        case 'cannondale kola a rámy':
            return "Cannondale";
        case 'gt kola a rámy':
            return 'GT';
        default:
            error_log('Manufacturer must be "CANNONDALE kola a rámy" or "GT kola a rámy".');
            return '';
    }
}

# Schindler & Bikeicon
function schindler_title($product_name, $manufacturer)
{
    // Validate inputs
    if (empty($product_name)) {
        error_log('Product name must not be empty.');
        return '';
    }

    // Remove manufacturer from product name invariantly
    $product_name = str_replace($manufacturer, '', $product_name);

    // Remove tailing " -*" from product name
    $product_name = preg_replace('/ -.*$/', '', $product_name);

    // Remove trailing and leading whitespace first
    $product_name = trim($product_name);

    return $product_name;
}

function schindler_price($price)
{
    //validate inputs
    if (empty($price)) {
        error_log('Price must not be empty.');
        return '';
    }

    // round price
    $price = round($price);

    return $price;
}

function schindler_bike_type($category)
{
    // Validate inputs
    if (empty($category)) {
        error_log('Category must not be empty.');
        return '';
    }

    // split by "|"
    $categories = explode('|', $category);

    // get main category
    $main_category = $categories[0];

    // remove trailing and leading whitespace
    $main_category = mb_strtolower(trim($main_category));

    switch ($main_category) {
        case 'bicykle':
            return 'Bicykle';
        case 'elektrobicykle':
            return 'Elektrobicykle';
        default:
            error_log('Unknown category: ' . $category);
            return '';
    }
}

function schindler_manufacturer($manufacturer)
{
    // Validate inputs
    if (empty($manufacturer)) {
        error_log('Manufacturer must not be empty.');
        return '';
    }

    // Remove trailing and leading whitespace first
    $manufacturer = strtolower(trim($manufacturer));

    switch ($manufacturer) {
        case 'ghost':
          return "Ghost";
        case 'lapierre':
          return 'Lapierre';
        case 'look':
          return 'Look';
        case 'moustache':
          return 'Moustache';
        case 'norco':
          return 'Norco';
        case 'pells':
          return 'Pells';
        case 'stevens':
          return 'Stevens';
        default:
            error_log('Manufacturer must be on of these: "Ghost", "Lapierre", "Look", "Moustache", "Norco", "Pells", "Stevens".');
            return '';
    }
}

# Kellys
function kellys_title(string $title, string $size = '', ?string $color = null): string {

    // 1. Strip "KELLYS " prefix (case-insensitive).
    $base = preg_replace( '/^KELLYS\s+/i', '', trim( $title ) );

    // 2. Strip the size token (whole word).
    //    The size column may contain values like "M / L" or "S (500mm)" — extract only
    //    the leading size letters (e.g. "M", "S", "XL") before any space/slash/paren.
    $size = trim( $size );
    if ( $size !== '' ) {
        $base_size = preg_replace( '/[\s\/\(].*$/u', '', $size );
        $base_size = trim( $base_size );
        if ( $base_size !== '' ) {
            $base = preg_replace( '/\b' . preg_quote( $base_size, '/' ) . '\b/', '', $base );
        }
    }

    // 3. Strip wheel-size patterns, e.g. 27.5", 29", 29"/27.5".
    $base = preg_replace( '/\d+(?:[.,]\d+)?"\s*(?:\/\s*\d+(?:[.,]\d+)?")?/', '', $base );

    // 4. Strip battery-capacity patterns, e.g. 725Wh, 820Wh.
    $base = preg_replace( '/\d+\s*Wh/i', '', $base );

    // 5. Normalise whitespace.
    $base = trim( preg_replace( '/\s+/', ' ', $base ) );

    // 6. If no colour, return the cleaned model string as-is.
    $color = trim( $color ?? '' );
    if ( $color === '' ) {
        return $base;
    }

    $color_words = preg_split( '/\s+/', $color );

    if ( count( $color_words ) === 1 ) {
        // Single-word colour (e.g. "Grey", "White", "Anthracite", "Black").
        //
        // Look for the colour word at the end of the stripped title and — if it is
        // preceded by a mixed-case modifier word like "Mocha" or "Ivory" (not an
        // all-caps abbreviation like "SH" or a single letter like "P") — include that
        // modifier in the colour suffix.
        $pattern = '/(?:([A-Z][a-z]+)\s+)?(' . preg_quote( $color_words[0], '/' ) . ')\s*$/i';

        if ( preg_match( $pattern, $base, $matches, PREG_OFFSET_CAPTURE ) ) {
            $model      = trim( substr( $base, 0, $matches[0][1] ) );
            $preceding  = $matches[1][0] ?? '';
            $color_word = $matches[2][0];

            $color_suffix = ( $preceding !== '' )
                ? ucwords( strtolower( $preceding ) ) . ' ' . ucwords( strtolower( $color_word ) )
                : ucwords( strtolower( $color_word ) );
        } else {
            // Colour word not present in the title at all (e.g. "Black" on Theos F100 SH).
            $model        = $base;
            $color_suffix = ucwords( strtolower( $color ) );
        }

    } else {
        // Multi-word colour (e.g. "Magic green", "Steel blue", "Graphite borealis").
        // Find the full phrase at the end of the stripped title.
        $phrase_pattern = '/' . implode( '\s+', array_map(
            fn( $w ) => preg_quote( $w, '/' ),
            $color_words
        ) ) . '\s*$/i';

        if ( preg_match( $phrase_pattern, $base, $matches, PREG_OFFSET_CAPTURE ) ) {
            $model        = trim( substr( $base, 0, $matches[0][1] ) );
            $color_suffix = ucwords( strtolower( $matches[0][0] ) );
        } else {
            $model        = $base;
            $color_suffix = ucwords( strtolower( $color ) );
        }
    }

    return $model . ' - ' . $color_suffix;
}

function kellys_bike_type(string $product_type): string {
    return stripos( $product_type, 'E-BIKE' ) !== false ? 'Elektrobicykle' : 'Bicykle';
}

function kellys_price($price, $currency) {
    //validate inputs
    if (empty($price)) {
        error_log('Price must not be empty.');
        return '';
    }

    if (empty($currency)) {
        error_log('Currency must not be empty.');
        return '';
    }

    $kellys_price = str_replace(mb_strtolower($currency), '', mb_strtolower($price));
    $kellys_price = trim($kellys_price);

    return round((float) $kellys_price);
}

function kellys_frame_size(string $frame_size): string {
    return trim($frame_size);
}

?>