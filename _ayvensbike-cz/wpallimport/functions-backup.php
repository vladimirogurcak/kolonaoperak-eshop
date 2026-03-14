<?php

function prislusenstvi( $string ) {
    $string = mb_strtolower( $string );
    $prislusenstvi = '';
    if ( str_contains( $string, 'blikačka přední' ) ) {
        $prislusenstvi = 'Blikačky a světla';
    } elseif ( str_contains( $string, 'blikačka zadní' ) ) {
        $prislusenstvi = 'Blikačky a světla';
    } elseif ( str_contains( $string, 'sada blikaček' ) ) {
        $prislusenstvi = 'Blikačky a světla';
    } elseif ( str_contains( $string, 'světlo přední' ) ) {
        $prislusenstvi = 'Blikačky a světla';
    } elseif ( str_contains( $string, 'brašna podsedlová' ) ) {
        $prislusenstvi = 'Brašny';
    } elseif ( str_contains( $string, 'cyklo láhve' ) ) {
        $prislusenstvi = 'Cyklo láhve';
    } elseif ( str_contains( $string, 'tachometry bezdrátové' ) ) {
        $prislusenstvi = 'Cyklo počítače a tachometry';
    } elseif ( str_contains( $string, 'košíky na láhve' ) ) {
        $prislusenstvi = 'Košíky na láhve';
    } elseif ( str_contains( $string, 'pump' ) ) {
        $prislusenstvi = 'Pumpy a pumpičky';
    } elseif ( str_contains( $string, 'bezdušový systém' ) ) {
        $prislusenstvi = 'Bezdušový systém';
    } elseif ( str_contains( $string, 'pedály' ) ) {
        $prislusenstvi = 'Pedály';
    }

    return ( !empty( $prislusenstvi ) ) ? 'Příslušenství | ' . $prislusenstvi : '';

}


function kategorie( $string ) {
    $string = mb_strtolower( $string );
    $kategorie = '';
    if ( str_contains( $string, 'elektro' ) ) {
        $kategorie = 'Elektrokola';
    } elseif ( str_contains( $string, 'jízdní' ) ) {
        $kategorie = 'Jízdní kola';
    } elseif ( str_contains( $string, 'ola skladem' ) ) {
        $kategorie = 'Elektrokola';
    }

    return ( !empty( $kategorie ) ) ? 'Typ | ' . $kategorie : '';

}

function druh( $string ) {
    $string = mb_strtolower( $string );
    $druh = '';
    if ( str_contains( $string, 'horská' ) ) {
        $druh = 'Horská kola';
    } elseif ( str_contains( $string, 'gravel' ) ) {
        $druh = 'Gravel a cyklokrosová kola';
    } elseif ( str_contains( $string, 'cyklokros' ) ) {
        $druh = 'Gravel a cyklokrosová kola';
    } elseif ( str_contains( $string, 'elektrokoloběž' ) ) {
        $druh = 'Elektrokoloběžky';
    } elseif ( str_contains( $string, 'silniční' ) ) {
        $druh = 'Silniční kola';
    } elseif ( str_contains( $string, 'městská' ) ) {
        $druh = 'Městská kola';
    }

    return ( !empty( $druh ) ) ? 'Druh | ' . $druh : '';

}

function velikost( $velikost ) {
    $velikost = ( array )explode( '/', $velikost );
    return trim( str_replace( array( '"', ',', '&quot;' ), array( '', '.', '' ), $velikost[ 0 ] ) );
}

function round_fix( $price ) {
    return round( ( int )$price );
}

function nazev_lbs_sport( $nazev, $typ = 'ean' ) {
    $nazev = explode( '-', $nazev );
    if ( is_array( $nazev ) && count( $nazev ) == 2 )
        return ( $typ === 'ean' ) ? trim( $nazev[ 1 ] ) : trim( $nazev[ 0 ] );
    else
        return $nazev;
}

function nazev( $nazev ) {
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
        $category = 'Horská';
    }
    if ( strpos( $category, 'silniční' ) !== false ) {
        $category = 'Silniční';
    }
    if ( strpos( $category, 'městská' ) !== false ) {
        $category = 'Městská';
    }
    if ( strpos( $category, 'treková' ) !== false || strpos( $category, 'cross' ) !== false || strpos( $category, 'treking' ) !== false ) {
        $category = 'Crossová a Treková';
    }
    if ( strpos( $category, 'dámská' ) !== false ) {
        $category = 'Dámská';
    }
    if ( strpos( $category, 'dětská' ) !== false ) {
        $category = 'Dětská';
    }
    if ( strpos( $category, 'elektrokola' ) !== false ) {
        $category = 'Elektrokola';
    }
    if ( strpos( $category, 'jízdní kola' ) !== false ) {
        $category = 'Jízdní kola';
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
            'Cannondale Kola A Rã¡My',
            'CANNONDALE kola a rámy'

        ), array(
            'Lapierre',
            'Ghost',
            'Ghost',
            'Rock Machine',
            'Rock Machine',
            'Pells',
            'Gt',
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
    preg_match( '/(.*)Velikost: (.*cm)/', $productname, $matches );
    if ( count( $matches ) == 3 ) {
        return trim( $matches[ 1 ] );
    }
    return $productname;
}
function get_velikost_from_title( $productname = '' ) {
    preg_match( '/(.*)Velikost: (.*cm)/', $productname, $matches );
    if ( count( $matches ) == 3 ) {
        return trim( str_replace( 'cm', '', $matches[ 2 ] ) );
    }
    return $productname;
}
?>