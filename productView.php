<?php
$array = require_once "assets/php/arrayEchipamente.php";
require_once "assets/php/functions.php";
$product= $_GET['product'];
if(!empty($product)){
    $productArray = getProductEchipamenteById($product, $array);
    $descriptionArray = getProductDescriptionById($product, $array);
    $productFinal = buildProductEchipamenteByName($productArray, $descriptionArray);

    $html = file_get_contents('assets/html/viewProduct.html');
    $topBar = file_get_contents('assets/html/topBar.html');
    $footer = file_get_contents('assets/html/footer.html');
    $header = file_get_contents('assets/html/header.html');

    $html = str_replace("{{ meta }}", buildMeta($productArray), $html);
    $html = str_replace("{{ topBar }}", $topBar, $html);
    $html = str_replace("{{ header }}", $header, $html);
    $html = str_replace("{{ breadcrumbs }}", buildEchipamenteProductBreadcrumbs($productArray), $html);
    $html = str_replace("{{ body }}", $productFinal, $html);
    $html = str_replace("{{ footer }}", $footer, $html);

    echo $html;
}else{
    echo 'asd'; exit;
}
