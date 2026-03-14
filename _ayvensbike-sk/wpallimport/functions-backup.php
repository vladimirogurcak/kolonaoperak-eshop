<?php

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
   /* return ( $price / get_cnb_kurz( $mena ) );*/
}

function oprava_kurz( $price ) {
  return round( $price / oprava_get_cnb_eur( $last_number ) );
}

function round_fix( $price ) {
    return round( ( int )$price );
}

function dph_eur_fix( $price ) {
    return round( $price * 1.2 );
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
?>