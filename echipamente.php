<?php
    require_once "assets/php/functions.php";

    $category = require_once "assets/php/echipamenteCategory.php";
    $html = file_get_contents('assets/html/category.html');
    $topBar = file_get_contents('assets/html/topBar.html');
    $header = file_get_contents('assets/html/header.html');
    $footer = file_get_contents('assets/html/footer.html');
    $getCategory = 'Echipamente';

    $html = str_replace('{{ topBar }}', $topBar, $html);
    $html = str_replace('{{ header }}', $header, $html);
    $html = str_replace('{{ meta }}', buildMetaCategory($category, $getCategory), $html);
    $html = str_replace('{{ breadcrumbs }}',CategoryBreadcrumbs($getCategory), $html);
    $html = str_replace('{{ body }}', getCategory($category, $getCategory), $html);
    $html = str_replace('{{ footer }}', $footer, $html);

    echo $html;

?>