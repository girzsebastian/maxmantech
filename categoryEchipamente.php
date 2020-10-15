<?php
$array = require_once "assets/php/arrayEchipamente.php";
require_once "assets/php/functions.php";
$category= $_GET['category'];
if(!empty($category)){
    $categoryArray = getCategoryByName($category, $array);
    $categoryFinal = buildCategoryEchipamenteByName($categoryArray);
    $metaArray = getArrayMetaCategory($categoryArray);
    $html = file_get_contents('assets/html/category.html');
    $topBar = file_get_contents('assets/html/topBar.html');
    $footer = file_get_contents('assets/html/footer.html');
    $header = file_get_contents('assets/html/header.html');
    $html = str_replace("{{ meta }}", buildMetaCategories($metaArray), $html);
    $html = str_replace("{{ topBar }}", $topBar, $html);
    $html = str_replace("{{ header }}", $header, $html);
    $html = str_replace("{{ breadcrumbs }}", buildEchipamenteBreadcrumbs($category), $html);
    $html = str_replace("{{ body }}", $categoryFinal, $html);
    $html = str_replace("{{ footer }}", $footer, $html);

    echo $html;
}else{
    echo 'asd'; exit;
}
