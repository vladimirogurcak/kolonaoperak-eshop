<?php

# Ayvens

function ayvens_bike_type($category_text)
{
    if (empty($category_text)) {
        error_log('Category text must not be empty.');
        return '';
    }

    $category_text = mb_strtolower($category_text);

    if (str_contains($category_text, 'elektrokola')) {
        return 'Elektrokola';
    } elseif (str_contains($category_text, 'jízdní kola')) {
        return 'Jízdní kola';
    } else {
        error_log('Unknown bike type: ' . $category_text);
        return '';
    }
}
?>