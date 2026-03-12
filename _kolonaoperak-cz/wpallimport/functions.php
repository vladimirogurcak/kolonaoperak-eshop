<?php

use function PHPSTORM_META\map;

function velikostramu($string)
{
  $data = array(
    'XS' => array(
      'XS/44',
      'XS 520',
      '700Cx50cm(XS)',
      '27.5x13.0"(XS)',
      '520',
      '12',
      "12''",
      '12"',
      '12.5"',
      '13',
      "13''",
      '13"',
      '14, 14',
      '14',
      '14"',
      'XS (27.5")',
      'XS (27,5")',
      'XS/14',
      'XS/15',
      'XS/16',
      'XS/17'
    ),
    'S' => array(
      '15',
      '15"',
      'S, 0.000 kg',
      'S/46',
      'S/49',
      'S/50',
      'S/14',
      'S/14.5',
      'S/14,5',
      'S/15',
      'S/15.5',
      'S/15,5',
      'S/16',
      'S/16.5',
      'S/16,5',
      'S/17',
      'S/17.5',
      'S/17,5',
      'S (27,5)',
      'S/18',
      'S/18.5',
      'S/18,5',
      'S 540',
      '29x16.0',
      '29x15.5"(S)',
      '27.5x15.5"(S)',
      '29x16.0"(S)',
      '700Cx52cm(S)',
      '540',
      '15, 17, 19, 15',
      '15, 17, 19, 21, 15',
      'S1 (S)',
      'S1',
      'S (29")',
      'S ( 14")',
      'S (14")',
      'S (15")'
    ),
    'M' => array(
      '16',
      '16"',
      '17',
      '17"',
      '18"',
      'M/52',
      'M, 0.000 kg',
      'M/16',
      'M/16.5',
      'M/16,5',
      'M/17',
      'M/17.5',
      'M/17,5',
      'M/18',
      'M/19',
      'M/20',
      'M/49',
      'M/50',
      'M/51',
      'M/52',
      'M/53',
      'M/54',
      'M/520mm',
      'M 560',
      'M 17" (440)',
      '16" (440)',
      '17", 0.000 kg',
      '29x17.5"(M)',
      '29x18.0"(M)',
      '700Cx17.0"(M)',
      '700Cx54cm(M)',
      '540mm',
      '560mm',
      '560',
      'M (17")',
      'S2',
      'S2 (M)',
      'SZ2 (M)',
      'SZ2',
      '17, 19',
      '16, 18, 16',
      '16, 18, 20, 16',
      '17,19',
      '15, 17, 19, 17',
      '17, 19, 17',
      '17, 19, 21, 17',
      '15, 17, 19, 21, 17',
      '15", 17", 19", 17"',
      '17", 19", 17"',
      '17", 19", 21", 17"',
      'M (16")',
      'M (17")',
      'M (18")',
      'M 17" (430)',
      'MD'
    ),
    'ML' => array(
      'M, L'
    ),
    'L' => array(
      '18',
      '18"',
      '19',
      '19"',
      '20"',
      'L, 0.000 kg',
      'L/18',
      'L/18.5',
      'L/18,5',
      'L/19',
      'L/19.5',
      'L/19,5',
      'L/20',
      'L/20.5',
      'L/20,5',
      'L/21',
      'L/21.5',
      'L/21,5',
      'L (29)',
      'L/52',
      'L/53',
      'L/53,5',
      'L/55',
      'L/56',
      'L/550mm',
      'LG',
      'L (29")',
      'L 18" (450)',
      '18" (450)',
      '18" (480)',
      'L 19" (480)',
      '19", 0.000 kg',
      '29x20.0"(L)',
      '29x19.0"(L)',
      '700Cx18.0"(L)',
      '700Cx19.0"(L)',
      '700Cx56cm(L)',
      '580',
      '580mm',
      'L 580',
      'L (19")',
      'L (29")',
      'S3 (L)',
      'S3',
      'SZ3 (L)',
      'SZ3',
      '15, 17, 19, 19',
      '15, 17, 19, 21, 19',
      '17, 19, 19',
      '17, 19, 21, 19',
      '18, 20, 18',
      '16, 18, 18',
      '16, 18, 20, 18',
      '18, 20, 22, 18',
      '17,5, 19,5, 21,5, 21,5',
      '15", 17", 19", 19"',
      '17", 19", 19"',
      '17", 19", 21", 19"',
      '18", 20", 18"',
      '18", 20", 22", 18"',
      '17,5", 19,5", 21,5", 21,5"',
      'L (18")',
      'L (19")',
      'L (20")'
    ),
    'XL' => array(
      '20',
      '20"',
      '21',
      '21"',
      '22',
      '22"',
      'XL, 0.000 kg',
      'XL/20',
      'XL/20.5',
      'XL/20,5',
      'XL/21',
      'XL/21.5',
      'XL/21,5',
      'XL/22',
      'XL/22.5',
      'XL/22,5',
      'XL/23',
      'XL/23.5',
      'XL/23,5',
      'XL (29)',
      'XL/55',
      'XL/56',
      'XL/58',
      'XL/570mm',
      'XL (29")',
      'XL 600',
      'XL 20" (495)',
      '20" (495)',
      '21", 0.000 kg',
      '29x21.0"(XL)',
      '29x22.0"(XL)',
      '700Cx21.0"(XL)',
      '700Cx58cm(XL)',
      '600',
      'XL (20")',
      'XL (21")',
      'XL (22")',
      'XL (29")',
      'S4 (XL)',
      'SZ4 (XL)',
      'SZ4',
      'S4',
      '15, 17, 19, 21, 21',
      '16, 18, 20, 20',
      '17, 19, 21, 21',
      '18, 20, 20',
      '18, 20, 22, 20',
      '18, 20, 22, 22'
    ),
    'XXL' => array(
      'S5 (XXL)',
      'S5',
      'S6',
      '23',
      '24',
      'XXL/22',
      'XXL/22.5',
      'XXL/23'
    ),
    'UNI' => array(
      'X'
    ),
    '40' => array(
      '40cm',
      '40 cm'
    ),
    '41' => array(
      '41cm',
      '41 cm'
    ),
    '42' => array(
      '42cm',
      '42 cm'
    ),
    '43' => array(
      '43cm',
      '43 cm'
    ),
    '44' => array(
      '44cm',
      '44 cm'
    ),
    '45' => array(
      '45cm',
      '45 cm'
    ),
    '46' => array(
      '46cm',
      '46 cm'
    ),
    '47' => array(
      '47cm',
      '47 cm'
    ),
    '48' => array(
      '48cm',
      '48 cm'
    ),
    '49' => array(
      '49cm',
      '49 cm'
    ),
    '50' => array(
      '50cm',
      '50 cm'
    ),
    '51' => array(
      '51cm',
      '51 cm'
    ),
    '52' => array(
      '52cm',
      '52 cm'
    ),
    '53' => array(
      '53cm',
      '53 cm'
    ),
    '54' => array(
      '54cm',
      '54 cm'
    ),
    '55' => array(
      '55cm',
      '55 cm'
    ),
    '56' => array(
      '56cm',
      '56 cm'
    ),
    '57' => array(
      '57cm',
      '57 cm'
    ),
    '58' => array(
      '58cm',
      '58 cm'
    ),
    '59' => array(
      '59cm',
      '59 cm'
    ),
    '60' => array(
      '60cm',
      '60 cm'
    ),
    '61' => array(
      '61cm',
      '61 cm'
    ),
    '62' => array(
      '62cm',
      '62 cm'
    ),
    '63' => array(
      '63cm',
      '63 cm'
    ),
    '64' => array(
      '64cm',
      '64 cm'
    ),
    '65' => array(
      '65cm',
      '65 cm'
    ),
    '66' => array(
      '66cm',
      '66 cm'
    ),
    '67' => array(
      '67cm',
      '67 cm'
    ),
    '68' => array(
      '68cm',
      '68 cm'
    ),
    '69' => array(
      '69cm',
      '69 cm'
    ),
    '70' => array(
      '70cm',
      '70 cm'
    ),
    '71' => array(
      '71cm',
      '71 cm'
    ),
    '72' => array(
      '72cm',
      '72 cm'
    ),
    '73' => array(
      '73cm',
      '73 cm'
    ),
    '74' => array(
      '74cm',
      '74 cm'
    ),
    '75' => array(
      '75cm',
      '75 cm'
    ),
    '76' => array(
      '76cm',
      '76 cm'
    ),
    '77' => array(
      '77cm',
      '77 cm'
    ),
    '78' => array(
      '78cm',
      '78 cm'
    ),
    '79' => array(
      '79cm',
      '79 cm'
    ),
    '80' => array(
      '80cm',
      '80 cm'
    ),
    'S2' => array(),
    'S3' => array(),
    'S4' => array()
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

function velikostramubikeicon($string)
{
  $data = array(
    'XS' => array(
      'XS/44',
      'XS 520',
      '700Cx50cm(XS)',
      '520',
      '14, 14',
      '14',
      '14"',
      'XS (27.5")',
      'XS (27,5")',
      'XS/14',
      'XS/15'
    ),
    'S' => array(
      '15',
      '15"',
      'S, 0.000 kg',
      'S/46',
      'S/49',
      'S/50',
      'S/14',
      'S/14.5',
      'S/14,5',
      'S/15',
      'S/15.5',
      'S/15,5',
      'S/16',
      'S/16.5',
      'S/16,5',
      'S/17',
      'S/17.5',
      'S/17,5',
      'S/18',
      'S/18.5',
      'S/18,5',
      'S 540',
      '29x15.5"(S)',
      '700Cx52cm(S)',
      '540',
      '540mm',
      '15, 17, 19, 15',
      'S1 (S)',
      'S1',
      'S (29")',
      'S ( 14")',
      'S (14")',
      'S (15")',
      '24',
    ),
    'M' => array(
      '16',
      '16"',
      '17',
      '17"',
      '18"',
      'M/52',
      'M, 0.000 kg',
      'M/16',
      'M/16.5',
      'M/16,5',
      'M/17',
      'M/17.5',
      'M/17,5',
      'M/49',
      'M/50',
      'M/51',
      'M/52',
      'M/53',
      'M/54',
      'M/520mm',
      'M 560',
      'M 17" (440)',
      '16" (440)',
      '17", 0.000 kg',
      '29x17.5"(M)',
      '700Cx17.0"(M)',
      '700Cx54cm(M)',
      '560',
      '560mm',
      'M (17")',
      'S2',
      'S2 (M)',
      'SZ2 (M)',
      'SZ2',
      '17, 19',
      '15, 17, 19, 17',
      '17, 19, 17',
      '17, 19, 21, 17',
      '15", 17", 19", 17"',
      '17", 19", 17"',
      '17", 19", 21", 17"',
      'M (16")',
      'M (17")',
      'M (18")',
      'M 17" (430)',
      'MD'
    ),
    'ML' => array(
      'M, L'
    ),
    'L' => array(
      '19',
      '19"',
      '20"',
      'L, 0.000 kg',
      'L/18',
      'L/18.5',
      'L/18,5',
      'L/19',
      'L/19.5',
      'L/19,5',
      'L/20',
      'L/20.5',
      'L/20,5',
      'L/21',
      'L/21.5',
      'L/21,5',
      'L (29)',
      'L/52',
      'L/53',
      'L/53,5',
      'L/55',
      'L/56',
      'L/550mm',
      'LG',
      'L (29")',
      'L 18" (450)',
      '18" (450)',
      '18" (480)',
      'L 19" (480)',
      '19", 0.000 kg',
      '29x19.0"(L)',
      '700Cx19.0"(L)',
      '700Cx56cm(L)',
      '580',
      '580mm',
      'L 580',
      'L (19")',
      'L (29")',
      'S3 (L)',
      'S3',
      'SZ3 (L)',
      'SZ3',
      '15, 17, 19, 19',
      '17, 19, 19',
      '17, 19, 21, 19',
      '18, 20, 18',
      '18, 20, 22, 18',
      '17,5, 19,5, 21,5, 21,5',
      '15", 17", 19", 19"',
      '17", 19", 19"',
      '17", 19", 21", 19"',
      '18", 20", 18"',
      '18", 20", 22", 18"',
      '17,5", 19,5", 21,5", 21,5"',
      'L (18")',
      'L (19")',
      'L (20")'
    ),
    'XL' => array(
      '20',
      '20"',
      '21',
      '21"',
      '22',
      '22"',
      'XL, 0.000 kg',
      'XL/20',
      'XL/20.5',
      'XL/20,5',
      'XL/21',
      'XL/21.5',
      'XL/21,5',
      'XL/22',
      'XL/22.5',
      'XL/22,5',
      'XL/23',
      'XL/23.5',
      'XL/23,5',
      'XL (29)',
      'XL/55',
      'XL/56',
      'XL/58',
      'XL/570mm',
      'XL (29")',
      'XL 600',
      'XL 20" (495)',
      '20" (495)',
      '21", 0.000 kg',
      '29x21.0"(XL)',
      '700Cx21.0"(XL)',
      '700Cx58cm(XL)',
      '600',
      'XL (20")',
      'XL (21")',
      'XL (22")',
      'XL (29")',
      'S4 (XL)',
      'SZ4 (XL)',
      'SZ4',
      'S4',
      '17, 19, 21, 21',
      '18, 20, 20',
      '18, 20, 22, 22'
    ),
    'XXL' => array(
      'S5 (XXL)',
      'S5',
      'S6',
      'XXL/22',
      'XXL/22.5',
      'XXL/23',
      'SZ5 (XXL)'
    ),
    'UNI' => array(
      'X'
    ),
    '40' => array(
      '40cm',
      '40 cm'
    ),
    '41' => array(
      '41cm',
      '41 cm'
    ),
    '42' => array(
      '42cm',
      '42 cm'
    ),
    '43' => array(
      '43cm',
      '43 cm'
    ),
    '44' => array(
      '44cm',
      '44 cm'
    ),
    '45' => array(
      '45cm',
      '45 cm'
    ),
    '46' => array(
      '46cm',
      '46 cm'
    ),
    '47' => array(
      '47cm',
      '47 cm'
    ),
    '48' => array(
      '48cm',
      '48 cm'
    ),
    '49' => array(
      '49cm',
      '49 cm'
    ),
    '50' => array(
      '50cm',
      '50 cm'
    ),
    '51' => array(
      '51cm',
      '51 cm'
    ),
    '52' => array(
      '52cm',
      '52 cm'
    ),
    '53' => array(
      '53cm',
      '53 cm'
    ),
    '54' => array(
      '54cm',
      '54 cm'
    ),
    '55' => array(
      '55cm',
      '55 cm'
    ),
    '56' => array(
      '56cm',
      '56 cm'
    ),
    '57' => array(
      '57cm',
      '57 cm'
    ),
    '58' => array(
      '58cm',
      '58 cm'
    ),
    '59' => array(
      '59cm',
      '59 cm'
    ),
    '60' => array(
      '60cm',
      '60 cm'
    ),
    '61' => array(
      '61cm',
      '61 cm'
    ),
    '62' => array(
      '62cm',
      '62 cm'
    ),
    '63' => array(
      '63cm',
      '63 cm'
    ),
    '64' => array(
      '64cm',
      '64 cm'
    ),
    '65' => array(
      '65cm',
      '65 cm'
    ),
    '66' => array(
      '66cm',
      '66 cm'
    ),
    '67' => array(
      '67cm',
      '67 cm'
    ),
    '68' => array(
      '68cm',
      '68 cm'
    ),
    '69' => array(
      '69cm',
      '69 cm'
    ),
    '70' => array(
      '70cm',
      '70 cm'
    ),
    '71' => array(
      '71cm',
      '71 cm'
    ),
    '72' => array(
      '72cm',
      '72 cm'
    ),
    '73' => array(
      '73cm',
      '73 cm'
    ),
    '74' => array(
      '74cm',
      '74 cm'
    ),
    '75' => array(
      '75cm',
      '75 cm'
    ),
    '76' => array(
      '76cm',
      '76 cm'
    ),
    '77' => array(
      '77cm',
      '77 cm'
    ),
    '78' => array(
      '78cm',
      '78 cm'
    ),
    '79' => array(
      '79cm',
      '79 cm'
    ),
    '80' => array(
      '80cm',
      '80 cm'
    ),
    'S2' => array(),
    'S3' => array(),
    'S4' => array()
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

function prislusenstvi($string)
{
  $string = mb_strtolower($string);
  $prislusenstvi = '';
  if (str_contains($string, 'blikačka přední')) {
    $prislusenstvi = 'Blikačky a světla';
  } elseif (str_contains($string, 'blikačka zadní')) {
    $prislusenstvi = 'Blikačky a světla';
  } elseif (str_contains($string, 'sada blikaček')) {
    $prislusenstvi = 'Blikačky a světla';
  } elseif (str_contains($string, 'světlo přední')) {
    $prislusenstvi = 'Blikačky a světla';
  } elseif (str_contains($string, 'brašna podsedlová')) {
    $prislusenstvi = 'Brašny';
  } elseif (str_contains($string, 'cyklo láhve')) {
    $prislusenstvi = 'Cyklo láhve';
  } elseif (str_contains($string, 'tachometry bezdrátové')) {
    $prislusenstvi = 'Cyklo počítače a tachometry';
  } elseif (str_contains($string, 'košíky na láhve')) {
    $prislusenstvi = 'Košíky na láhve';
  } elseif (str_contains($string, 'pump')) {
    $prislusenstvi = 'Pumpy a pumpičky';
  } elseif (str_contains($string, 'bezdušový systém')) {
    $prislusenstvi = 'Bezdušový systém';
  } elseif (str_contains($string, 'pedály')) {
    $prislusenstvi = 'Pedály';
  } elseif (str_contains($string, 'ámky')) {
    $prislusenstvi = 'Zámky';
  }

  return (!empty($prislusenstvi)) ? 'Příslušenství | ' . $prislusenstvi : '';
}
/* mb_strtolower = nezalezi na velikost pismen vzstupu jen je potreba napsat vzdy tady celeslova ale pouze  male pismena */

function kategorie($string)
{
  $string = mb_strtolower($string);
  $kategorie = '';
  if (str_contains($string, 'lektro')) {
    $kategorie = 'Elektrokola';
  } elseif (str_contains($string, 'ízdní')) {
    $kategorie = 'Jízdní kola';
  } elseif (str_contains($string, 'ola skladem')) {
    $kategorie = 'Elektrokola';
  } elseif (str_contains($string, 'e-mtb')) {
    $kategorie = 'Elektrokola';
  } elseif (str_contains($string, 'e-tour')) {
    $kategorie = 'Elektrokola';
  } elseif (str_contains($string, 'evná')) {
    $kategorie = 'Jízdní kola';
  } elseif (str_contains($string, 'ikes')) {
    $kategorie = 'Jízdní kola';
  }
  return (!empty($kategorie)) ? 'Typ | ' . $kategorie : '';
}

function druh($string)
{
  $string = mb_strtolower($string);
  $druh = '';
  if (str_contains($string, 'orská')) {
    $druh = 'Horská kola';
  } elseif (str_contains($string, 'gravel')) {
    $druh = 'Gravel a cyklokrosová kola';
  } elseif (str_contains($string, 'cyklokros')) {
    $druh = 'Gravel a cyklokrosová kola';
  } elseif (str_contains($string, 'elektrokoloběž')) {
    $druh = 'Elektrokoloběžky';
  } elseif (str_contains($string, 'ilniční')) {
    $druh = 'Silniční kola';
  } elseif (str_contains($string, 'ěstská')) {
    $druh = 'Městská kola';
  } elseif (str_contains($string, 'mtb')) {
    $druh = 'Horská kola';
  } elseif (str_contains($string, 'urban')) {
    $druh = 'Městská kola';
  } elseif (str_contains($string, 'ravel')) {
    $druh = 'Gravel a cyklokrosová kola';
  } elseif (str_contains($string, 'our')) {
    $druh = 'Městská kola';
  } elseif (str_contains($string, 'estovní')) {
    $druh = 'Silniční kola';
  } elseif (str_contains($string, 'rosová')) {
    $druh = 'Gravel a cyklokrosová kola';
  } elseif (str_contains($string, 'hardtail')) {
    $druh = 'Horská kola';
  } elseif (str_contains($string, 'kční')) {
    $druh = 'Horská kola';
  }
  return (!empty($druh)) ? 'Druh | ' . $druh : '';
}

/*LSC TYP */

function kategorielsc($string)
{
  $string = mb_strtolower($string);
  $kategorie = '';
  if (str_contains($string, 'e-tour')) {
    $kategorie = 'Elektrokola';
  } elseif (str_contains($string, 'elektrokola')) {
    $kategorie = 'Elektrokola';
  } elseif (str_contains($string, 'e-urban')) {
    $kategorie = 'Elektrokola';
  } elseif (str_contains($string, 'kola')) {
    $kategorie = 'Jízdní kola';
  } elseif (str_contains($string, 'e-mtb')) {
    $kategorie = 'Elektrokola';
  } elseif (str_contains($string, 'mtb hardtail')) {
    $kategorie = 'Jízdní kola';
  } elseif (str_contains($string, 'mtb full suspension')) {
    $kategorie = 'Jízdní kola';
  } elseif (str_contains($string, 'road and gravel')) {
    $kategorie = 'Jízdní kola';
  } elseif (str_contains($string, 'urban')) {
    $kategorie = 'Jízdní kola';
  } elseif (str_contains($string, 'junior')) {
    $kategorie = 'Jízdní kola';
  }

  return (!empty($kategorie)) ? '' . $kategorie : '';
}


/*LSC DRUH */
function druhlsc($string)
{
  $string = mb_strtolower($string);
  $druh = '';
  if (str_contains($string, 'horská')) {
    $druh = 'Horská kola';
  } elseif (str_contains($string, 'cestovní')) {
    $druh = 'Silniční kola';
  } elseif (str_contains($string, 'horská')) {
    $druh = 'Horská kola';
  } elseif (str_contains($string, 'pevná')) {
    $druh = 'Horská kola';
  } elseif (str_contains($string, 'city')) {
    $druh = 'Městská kola';
  } elseif (str_contains($string, 'gravel')) {
    $druh = 'Gravel a cyklokrosová kola';
  } elseif (str_contains($string, 'krosová')) {
    $druh = 'Gravel a cyklokrosová kola';
  } elseif (str_contains($string, 'mtb hardtail')) {
    $druh = 'Horská kola';
  } elseif (str_contains($string, 'mtb full suspension')) {
    $druh = 'Horská kola';
  } elseif (str_contains($string, 'road and gravel')) {
    $druh = 'Gravel a cyklokrosová kola';
  } elseif (str_contains($string, 'urban')) {
    $druh = 'Městská kola';
  } elseif (str_contains($string, 'e-mtb')) {
    $druh = 'Horská kola';
  } elseif (str_contains($string, 'e-tour')) {
    $druh = 'Gravel a cyklokrosová kola';
  }


  return (!empty($druh)) ? '' . $druh : '';
}


/* SHARVAN */

function kategoriesharvan($string)
{
  $string = mb_strtolower($string);
  $kategorie = '';
  if (str_contains($string, 'skladové')) {
    $kategorie = 'Elektrokola';
  } else {
    $kategorie = 'Jízdní kola';
  }
  return (!empty($kategorie)) ? '' . $kategorie : '';
}


function druhsharvan($string)
{
  $string = mb_strtolower($string);
  $druh = '';
  if (str_contains($string, 'skladové')) {
    $druh = 'Městská kola';
  }
  return (!empty($druh)) ? '' . $druh : '';
}

/*KELLYS */

function kategoriekellys($string)
{
  $string = mb_strtolower($string);
  $kategorie = '';
  if (str_contains($string, 'e-bike')) {
    $kategorie = 'Elektrokola';
  } else {
    $kategorie = 'Jízdní kola';
  }
  return (!empty($kategorie)) ? '' . $kategorie : '';
}


function druhkellys($string)
{
  $string = mb_strtolower($string);
  $druh = '';
  if (str_contains($string, 'silniční')) {
    $druh = 'Silniční kola';
  } elseif (str_contains($string, 'downhill')) {
    $druh = 'Horská kola';
  } elseif (str_contains($string, 'enduro')) {
    $druh = 'Horská kola';
  } elseif (str_contains($string, 'trail')) {
    $druh = 'Horská kola';
  } elseif (str_contains($string, 'xc')) {
    $druh = 'Horská kola';
  } elseif (str_contains($string, 'dámská horská')) {
    $druh = 'Horská kola';
  } elseif (str_contains($string, 'dirtová')) {
    $druh = 'Horská kola';
  } elseif (str_contains($string, 'krosová')) {
    $druh = 'Gravel a cyklokrosová kola';
  } elseif (str_contains($string, 'trekking')) {
    $druh = 'Treková kola';
  } elseif (str_contains($string, 'city')) {
    $druh = 'Městská kola';
  } elseif (str_contains($string, 'trekki')) {
    $druh = 'Treková kola';
  }
  return (!empty($druh)) ? '' . $druh : '';
}


function nazevkellys($nazev)
{
  $nazev = str_replace(
    array(
      ' XXS 26"',
      ' XS 26"',
      ' M 26"',
      ' L 26"',
      ' XL 26"',
      'S 29"/27.5"',
      ' M 29"/27.5"',
      ' L 29"/27.5"',
      ' XL 29"/27.5"',
      ' S 27.5"',
      ' M 27.5"',
      ' L 27.5"',
      ' XL 27.5"',
      ' S 28"',
      ' M 28"',
      ' L 28"',
      ' XL 28"',
      ' S 29"',
      ' M 29"',
      ' L 29"',
      ' XL 29"',
      ' 16"',
      ' 20"',
      ' 24"',
      ' 26"',
      ' 27.5"',
      ' 28"',
      ' 29"'
    ),
    array(
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      '',
      ''
    ),
    $nazev
  );

  if (mb_detect_encoding($nazev) === 'UTF-8') {
    $nazev = mb_convert_case(utf8_encode($nazev), MB_CASE_TITLE, 'UTF-8');
  } else {
    $nazev = mb_convert_case($nazev, MB_CASE_TITLE, 'UTF-8');
  }

  return $nazev;
}


function velikost($velikost)
{
  $velikost = (array)explode('/', $velikost);
  return trim(str_replace(array('"', ',', '&quot;'), array('', '.', ''), $velikost[0]));
}


function round_with_kurz_czk($price, $mena = 'EUR')
{
  return round($price * get_cnb_kurz($mena));
}

function round_fix($price)
{
  return round((int)$price);
}

function nazev_lbs_sport($nazev, $typ = 'ean')
{
  $nazev = explode('-', $nazev);
  if (is_array($nazev) && count($nazev) == 2)
    return ($typ === 'ean') ? trim($nazev[1]) : trim($nazev[0]);
  else
    return $nazev;
}

function nazev($nazev)
{
  $nazev = rtrim($nazev, '- S');
  $nazev = rtrim($nazev, '- M');
  $nazev = rtrim($nazev, '- L');
  $nazev = rtrim($nazev, '- XS');
  $nazev = rtrim($nazev, '- XL');
  $nazev = rtrim($nazev, ' S');
  $nazev = rtrim($nazev, ' M');
  $nazev = rtrim($nazev, ' L');
  $nazev = rtrim($nazev, ' XS');
  $nazev = rtrim($nazev, ' XL');
  $nazev = rtrim($nazev, ' 44');
  $nazev = rtrim($nazev, ' 49');
  $nazev = rtrim($nazev, ' 54');
  $nazev = rtrim($nazev, ' (S)');
  $nazev = rtrim($nazev, ' (M)');
  $nazev = rtrim($nazev, ' (L)');
  $nazev = rtrim($nazev, ' (XL)');
  return trim($nazev);
}


function odpruzeni($desc)
{
  if (strpos($desc, 'odpružený') !== false) {
    return 'Celoodpružená';
  }
}

function heureka_sklad($delivery)
{
  return (is_numeric($delivery) && $delivery < 32) ? 'instock' : 'outofstock';
}

function heureka_kategorie_kola($category)
{
  if (empty($category))
    return '';

  $category = mb_strtolower(end(explode('|', $category)));

  if (strpos($category, 'horská') !== false) {
    $category = 'Horská';
  }
  if (strpos($category, 'silniční') !== false) {
    $category = 'Silniční';
  }
  if (strpos($category, 'městská') !== false) {
    $category = 'Městská';
  }
  if (strpos($category, 'treková') !== false || strpos($category, 'cross') !== false || strpos($category, 'treking') !== false) {
    $category = 'Crossová a Treková';
  }
  if (strpos($category, 'dámská') !== false) {
    $category = 'Dámská';
  }
  if (strpos($category, 'dětská') !== false) {
    $category = 'Dětská';
  }
  if (strpos($category, 'elektrokola') !== false) {
    $category = 'Elektrokola';
  }
  if (strpos($category, 'jízdní kola') !== false) {
    $category = 'Jízdní kola';
  }
  return $category;
}

function location($lng, $lat, $address, $postal, $city)
{
  return maybe_serialize(array(
    'lat' => $lat,
    'lng' => $lng,
    'zoom' => 12,
    'markers' => array(array(
      'label' => $address . ', ' . $postal . ' ' . $city,
      'default_label' => $address . ', ' . $postal . ' ' . $city,
      'lat' => $lat,
      'lng' => $lng,
    )),
    'address' => $address . ', ' . $postal . ' ' . $city,
    'layers' => array('OpenStreetMap.Mapnik'),
    'version' => '1.3.2'
  ));
}

function vyrobci($string)
{

  $string = str_replace(
    array(
      'LAPIERRE E-Bikes',
      'Ghost E-Bikes',
      'GHOST E-Bikes',
      '23 Rock Machine',
      '23 ROCK MACHINE',
      'Machina De Rocas',
      'MACHINA de ROCAS',
      'PELLS s.r.o.',
      'Gt Kola A Rã¡My',
      'GT kola a rámy',
      'Cannondale Kola A Rã¡My',
      'CANNONDALE kola a rámy',
      'Cervélo', 
      'Ctm'
    ),
    array(
      'Lapierre',
      'Ghost',
      'Ghost',
      'Rock Machine',
      'Rock Machine',
      'Rock Machine',
      'Rock Machine',
      'Pells',
      'GT',
      'GT',
      'Cannondale',
      'Cannondale',
      'Cervélo',
      'CTM Bikes'
    ),
    $string
  );

  if (mb_detect_encoding($string) === 'UTF-8') {
    $string = mb_convert_case(utf8_encode($string), MB_CASE_TITLE, 'UTF-8');
  } else {
    $string = mb_convert_case($string, MB_CASE_TITLE, 'UTF-8');
  }

  return $string;
}


function rok_vyroby($rok)
{
  return (empty($rok)) ? '2021' : $rok;
}

function ean_or_itemid($ean = '', $itemid = '')
{
  return (!empty($ean)) ? $ean : $itemid;
}

function get_bracket_variant($productname = '')
{
  preg_match('/.*\(([^)]*)\)/', $productname, $matches);
  if (count($matches) == 2) {
    return trim(str_replace('(' . $matches[1] . ')', '(UNI)', $productname));
  }
  return $productname;
}

/* BBM OSEKANI NAZVU */

function strip_velikost_variant($productname = '')
{
  preg_match('/(.*)Velikost: (.*)/', $productname, $matches);
  if (count($matches) == 3) {
    return trim(str_replace('cm', '', $matches[1]));
    return trim($matches[1]);
  }
  return $productname;
}

function get_velikost_from_title($productname = '')
{
  preg_match('/(.*)Velikost: (.*cm)/', $productname, $matches);
  if (count($matches) == 3) {
    return trim(str_replace('cm', '', $matches[2]));
  }
  return $productname;
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
            return 'Elektrokola';
        default:
            return 'Jízdní kola';
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
    return 'Elektrokola';
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

    return str_contains($skibike_bike_type, 'elektro') ? 'Elektrokola' : 'Jízdní kola';
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

    return $contains_elektrokola || $has_engine ? 'Elektrokola' : 'Jízdní kola';
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
        case 'jízdní kola':
            return 'Jízdní kola';
        case 'elektrokola':
            return 'Elektrokola';
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

?>