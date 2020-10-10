<?php
function getCategoryByName(string $category, array $array)
{
    $categoryArray = [];
    if (is_array($array) || is_object($array)) {
        foreach ($array['products'] as $key => $value) {
            if ($key === $category) {
                $categoryArray[] = $value;
            }
        }
    }
    return $categoryArray;
}

function buildCategoryByName(array $categoryArray)
{
    $category = [];
    if (is_array($categoryArray) || is_object($categoryArray)) {
        foreach ($categoryArray as $innerArray) {
            if (!empty($innerArray)) {
                foreach ($innerArray as $key => $value) {
                    if (array_key_exists("image", $value) &&
                        array_key_exists("title", $value) &&
                        array_key_exists("cod", $value) &&
                        array_key_exists("putere", $value) &&
                        array_key_exists("greutate", $value) &&
                        array_key_exists("id", $value)) {
                        $file = file_get_contents('assets/html/productCard.html');
                        $file = str_replace(
                            ['{{ image }}', '{{ title }}', '{{ cod }}', '{{ putere }}', '{{ greutate }}', '{{ id }}'],
                            [$value['image'], $value['title'], $value['cod'], $value['putere'], $value['greutate'], $value['id']], $file);
                        $category[$key] = $file;
                    }
                }
            }
        }
    }
    return implode('', $category);
}

function buildUtilajeBreadcrumbs(string $category)
{
    $file = file_get_contents('assets/html/breadcrumbsUtilaje.html');
    $file = str_replace('{{ title }}', $category, $file);
    return $file;
}

function buildUtilajeProductBreadcrumbs(array $productArray)
{
    $file = file_get_contents('assets/html/breadcrumbsProductUtilaje.html');
    $file = str_replace(['{{ category }}', '{{ title }}'], [$productArray['category'], $productArray['title']], $file);
    return $file;
}

function getProductById(string $product, array $array)
{
    $resultSet = [];
    if (is_array($array) || is_object($array)) {
        foreach ($array as $val) {
            if (is_array($val) || is_object($val)) {
                foreach ($val as $value) {
                    if (is_array($value) || is_object($value)) {
                        foreach ($value as $value2) {
                            if (array_key_exists("id", $value2) &&
                                array_key_exists("category", $value2) &&
                                array_key_exists("title", $value2) &&
                                array_key_exists("descriereText", $value2)) {
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
                }
            }
        }
    }
    return null;
}

function getProductDescriptionById(string $product, $array)
{
    if (is_array($array) || is_object($array)) {
        foreach ($array as $val) {
            foreach ($val as $value) {
                foreach ($value as $value2) {
                    if (array_key_exists("id", $value2) &&
                        array_key_exists("descriereText", $value2)) {
                        if ($product == $value2['id']) {
                            $resultSet['descriereText'] = $value2['descriereText'];
                            return $resultSet;
                        }
                    }
                }
            }
        }
    }

    return null;
}

function buildProductByName(array $productArray, array $descriptionArray)
{
    $product = [];
    $file = file_get_contents('assets/html/productBody.html');
    $descriere = descriere($descriptionArray);
    $images = images($productArray);
    $file = str_replace(
        ['{{ image }}', '{{ title }}', '{{ cod }}', '{{ putere }}', '{{ greutate }}', '{{ descriere }}', '{{ descriereText }}', '{{ images }}'],
        [$productArray['image'], $productArray['title'], $productArray['cod'], $productArray['putere'], $productArray['greutate'], $productArray['descriere'], $descriere, $images], $file);
    $product[] = $file;
    return implode('', $product);
}

function images(array $productArray)
{
    $images = [];
    if (is_array($productArray) || is_object($productArray)) {
        foreach ($productArray as $innerArray) {
            if (is_array($innerArray) || is_object($innerArray)) {
                foreach ($innerArray as $key => $value) {
                    if (array_key_exists("title", $innerArray)) {
                        $img = file_get_contents('assets/html/image.html');
                        $img = str_replace(['{{ image }}', '{{ title }}'], [$value, $innerArray['title']], $img);
                        $images[$key] = $img;
                    }
                }
            }
        }
    }
    return implode('', $images);
}

function descriere(array $descriptionArray)
{
    $descriere = [];
    if (is_array($descriptionArray) || is_object($descriptionArray)) {
        foreach ($descriptionArray as $innerArray) {
            if (is_array($innerArray) || is_object($innerArray)) {
                foreach ($innerArray as $key => $value) {
                    $file = file_get_contents('assets/html/descriereProduct.html');
                    $file = str_replace(['{{ descriere }}', '{{ key }}'], [$value, $key], $file);
                    $descriere[$key] = $file;
                }
            }
        }
    }
    return implode('', $descriere);
}

function getArrayMetaCategory($categoryArray)
{
    $metaArray = [];
    if (is_array($categoryArray) || is_object($categoryArray)) {
        foreach ($categoryArray as $key => $value) {
            $metaArray = $value['meta'];
        }
    }
    return $metaArray;
}

function buildMetaCategory($metaArray)
{
    $file = file_get_contents('assets/html/meta.html');
    $file = str_replace(['{{ title }}', '{{ url }}', '{{ description }}'], [$metaArray['title'], $metaArray['url'], $metaArray['description']], $file);
    return $file;
}