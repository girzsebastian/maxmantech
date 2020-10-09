<?php
function buildBreadcrumbs($array, $title)
{
    $file = file_get_contents('assets/html/breadcrumbsUtilaje.html');
    $file = str_replace('{{ title }}', $title, $file);
    return $file;
}

function getCategoryByName($category, $array)
{
    $categoryArray = [];
    foreach ($array['products'] as $key => $value) {
        if ($key === $category) {
            $categoryArray[] = $value;
        }
    }
    return $categoryArray;
}

function buildCategoryByName($categoryArray)
{
    $category = [];
    foreach ($categoryArray as $innerArray) {
        foreach ($innerArray as $key => $value) {
            $file = file_get_contents('assets/html/productCard.html');
            $file = str_replace(
                ['{{ image }}', '{{ title }}', '{{ cod }}', '{{ putere }}', '{{ greutate }}', '{{ id }}'],
                [$value['image'], $value['title'], $value['cod'], $value['putere'], $value['greutate'], $value['id']], $file);
            $category[$key] = $file;
        }
    }
    return implode('', $category);
}

function buildUtilajeBreadcrumbs($category)
{
    $file = file_get_contents('assets/html/breadcrumbsUtilaje.html');
    $file = str_replace('{{ title }}', $category, $file);
    return $file;
}

function buildUtilajeProductBreadcrumbs($productArray)
{
    $file = file_get_contents('assets/html/breadcrumbsProductUtilaje.html');
    $file = str_replace(['{{ category }}', '{{ title }}'], [$productArray['category'], $productArray['title']], $file);
    return $file;
}

function getProductById($product, $array)
{
    foreach ($array as $val) {
        foreach ($val as $value) {
            foreach ($value as $key => $value2) {
                if ($product == $value2['id']) {
                    $resultSet['id'] = $value2['id'];
                    $resultSet['category'] = $value2['category'];
                    $resultSet['title'] = $value2['title'];
                    $resultSet['cod'] = $value2['cod'];
                    $resultSet['greutate'] = $value2['greutate'];
                    $resultSet['putere'] = $value2['putere'];
                    $resultSet['image'] = $value2['image'];
                    $resultSet['images'] = $value2['images'];
                    $resultSet['descriere'] = $value2['descriere'];
                    $resultSet['descriereText'] = $value2['descriereText'];
                    return $resultSet;
                }
            }
        }
    }
    return null;
}

function getProductDescriptionById($product, $array)
{
    foreach ($array as $val) {
        foreach ($val as $value) {
            foreach ($value as $key => $value2) {
                if ($product == $value2['id']) {
                    $resultSet['descriereText'] = $value2['descriereText'];
                    return $resultSet;
                }
            }
        }
    }
    return null;
}

function buildProductByName($productArray, $descriptionArray)
{
    $product = [];
    $file = file_get_contents('assets/html/productBody.html');
    $file = str_replace(
        ['{{ image }}', '{{ title }}', '{{ cod }}', '{{ putere }}', '{{ greutate }}', '{{ descriere }}', '{{ descriereText }}', '{{ images }}'],
        [$productArray['image'], $productArray['title'], $productArray['cod'], $productArray['putere'], $productArray['greutate'], $productArray['descriere'], descriere($descriptionArray), images($productArray)], $file);
    $product[] = $file;
    return implode('', $product);
}

function images($productArray)
{
    foreach ($productArray as $innerArray) {
        foreach ($innerArray as $key => $value) {
            $img = file_get_contents('assets/html/image.html');
            $img = str_replace(['{{ image }}', '{{ title }}'], [$value, $innerArray['title']], $img);
            $images[$key] = $img;
        }
    }
    return implode('', $images);
}

function descriere($descriptionArray)
{
    $descriere = [];
    foreach ($descriptionArray as $key0 => $innerArray) {
        foreach ($innerArray as $key => $value) {
            $file = file_get_contents('assets/html/descriereProduct.html');
            $file = str_replace(['{{ descriere }}', '{{ key }}'], [$value, $key], $file);
            $descriere[$key] = $file;
        }
    }
    return implode('', $descriere);
}