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
                        array_key_exists("id", $value)) {
                        if ($value['category'] == 'Banda transportatoare' or $value['category'] == 'Malaxor beton' or $value['category'] == 'Presa pavaje' or $value['category'] == 'Statie de beton') {
                            $file = file_get_contents('assets/html/productCard2.html');
                            $file = str_replace(
                                ['{{ image }}', '{{ title }}', '{{ cod }}', '{{ inaltime }}', '{{ lungime }}', '{{ latime }}', '{{ greutate }}', '{{ id }}', '{{ price }}'],
                                [$value['image'], $value['title'], $value['cod'], $value['inaltime'], $value['lungime'], $value['latime'], $value['greutate'], $value['id'], $value['price']], $file);
                            $category[$key] = $file;
                        }
                        if ($value['category'] == 'Electrostivuitoare'){
                            $file = file_get_contents('assets/html/productCard4.html');
                            $file = str_replace(
                                ['{{ image }}', '{{ title }}', '{{ cod }}', '{{ capacitate }}', '{{ cursa }}', '{{ viteza }}', '{{ lungime }}', '{{ tensiune }}','{{ id }}', '{{ price }}'],
                                [$value['image'], $value['title'], $value['cod'], $value['capacitate'], $value['cursa'], $value['viteza'], $value['lungime'], $value['tensiune'],$value['id'], $value['price']], $file);
                            $category[$key] = $file;
                        }
                        else {
                            if (array_key_exists("putere", $value)) {
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
        }
    }
    return implode('', $category);
}

function buildCategoryEchipamenteByName(array $categoryArray)
{
    $category = [];
    if (is_array($categoryArray) || is_object($categoryArray)) {
        foreach ($categoryArray as $innerArray) {
            if (!empty($innerArray)) {
                foreach ($innerArray as $key => $value) {
                    if (array_key_exists("image", $value) &&
                        array_key_exists("title", $value) &&
                        array_key_exists("id", $value)) {
                        $file = file_get_contents('assets/html/productCard3.html');
                        $file = str_replace(
                            ['{{ image }}', '{{ title }}', '{{ id }}', '{{ price }}'],
                            [$value['image'], $value['title'], $value['id'], $value['price']], $file);
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

function buildEchipamenteBreadcrumbs(string $category)
{
    $file = file_get_contents('assets/html/breadcrumbsEchipamente.html');
    $file = str_replace('{{ title }}', $category, $file);
    return $file;
}

function buildUtilajeProductBreadcrumbs(array $productArray)
{
    $file = file_get_contents('assets/html/breadcrumbsProductUtilaje.html');
    $file = str_replace(['{{ category }}', '{{ title }}'], [$productArray['category'], $productArray['title']], $file);
    return $file;
}

function buildEchipamenteProductBreadcrumbs(array $productArray)
{
    $file = file_get_contents('assets/html/breadcrumbsProductEchipamente.html');
    $file = str_replace(['{{ category }}', '{{ title }}'], [$productArray['category'], $productArray['title']], $file);
    return $file;
}

function CategoryBreadcrumbs(string $getCategory){
    $file = file_get_contents('assets/html/breadcrumbs.html');
    $file = str_replace('{{ name }}', $getCategory, $file);
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
                                if ($value2['category'] == 'Banda transportatoare' or $value2['category'] == 'Malaxor beton' or $value2['category'] == 'Presa pavaje' or $value2['category'] == 'Statie de beton') {
                                    if ($product == $value2['id']) {
                                        $resultSet['id'] = $value2['id'];
                                        $resultSet['category'] = $value2['category'];
                                        $resultSet['title'] = $value2['title'];
                                        $resultSet['cod'] = $value2['cod'];
                                        $resultSet['greutate'] = $value2['greutate'];
                                        $resultSet['inaltime'] = $value2['inaltime'];
                                        $resultSet['latime'] = $value2['latime'];
                                        $resultSet['lungime'] = $value2['lungime'];
                                        $resultSet['image'] = $value2['image'];
                                        $resultSet['price'] = $value2['price'];
                                        $resultSet['images'] = $value2['images'];
                                        $resultSet['descriere'] = $value2['descriere'];
                                        $resultSet['descriereText'] = $value2['descriereText'];
                                        $resultSet['meta'] = $value2['meta'];
                                        return $resultSet;
                                    }
                                }
                                if ($value2['category'] == 'Electrostivuitoare'){
                                    if ($product == $value2['id']) {
                                        $resultSet['id'] = $value2['id'];
                                        $resultSet['category'] = $value2['category'];
                                        $resultSet['title'] = $value2['title'];
                                        $resultSet['cod'] = $value2['cod'];
                                        $resultSet['viteza'] = $value2['viteza'];
                                        $resultSet['capacitate'] = $value2['capacitate'];
                                        $resultSet['lungime'] = $value2['lungime'];
                                        $resultSet['cursa'] = $value2['cursa'];
                                        $resultSet['tensiune'] = $value2['tensiune'];
                                        $resultSet['price'] = $value2['price'];
                                        $resultSet['image'] = $value2['image'];
                                        $resultSet['images'] = $value2['images'];
                                        $resultSet['descriere'] = $value2['descriere'];
                                        $resultSet['descriereText'] = $value2['descriereText'];
                                        $resultSet['meta'] = $value2['meta'];
                                        return $resultSet;
                                    }
                                } else {
                                    if ($product == $value2['id']) {
                                        $resultSet['id'] = $value2['id'];
                                        $resultSet['category'] = $value2['category'];
                                        $resultSet['title'] = $value2['title'];
                                        $resultSet['cod'] = $value2['cod'];
                                        $resultSet['greutate'] = $value2['greutate'];
                                        $resultSet['putere'] = $value2['putere'];
                                        $resultSet['price'] = $value2['price'];
                                        $resultSet['image'] = $value2['image'];
                                        $resultSet['images'] = $value2['images'];
                                        $resultSet['descriere'] = $value2['descriere'];
                                        $resultSet['descriereText'] = $value2['descriereText'];
                                        $resultSet['meta'] = $value2['meta'];
                                        return $resultSet;
                                    }
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

function getProductEchipamenteById(string $product, array $array)
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
                                    $resultSet['price'] = $value2['price'];
                                    $resultSet['image'] = $value2['image'];
                                    $resultSet['images'] = $value2['images'];
                                    $resultSet['descriere'] = $value2['descriere'];
                                    $resultSet['descriereText'] = $value2['descriereText'];
                                    $resultSet['meta'] = $value2['meta'];
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
    if ($productArray['category'] == 'Banda transportatoare' or $productArray['category'] == 'Malaxor beton' or $productArray['category'] == 'Presa pavaje' or $productArray['category'] == 'Statie de beton') {
        $product = [];
        $file = file_get_contents('assets/html/productBody2.html');
        $descriere2 = descriere2($descriptionArray);
        $images = images($productArray);
        $file = str_replace(
            ['{{ image }}', '{{ title }}', '{{ cod }}', '{{ greutate }}', '{{ inaltime }}', '{{ latime }}', '{{ lungime }}', '{{ descriere }}', '{{ descriereText }}', '{{ images }}', '{{ price }}'],
            [$productArray['image'], $productArray['title'], $productArray['cod'], $productArray['greutate'], $productArray['inaltime'], $productArray['latime'], $productArray['lungime'], $productArray['descriere'], $descriere2, $images, $productArray['price']], $file);
        $product[] = $file;
        return implode('', $product);
    }
    if ($productArray['category'] == 'Electrostivuitoare') {
        $product = [];
        $file = file_get_contents('assets/html/productBody4.html');
        $descriere2 = descriere2($descriptionArray);
        $images = images($productArray);
        $file = str_replace(
            ['{{ image }}', '{{ title }}', '{{ cod }}', '{{ capacitate }}', '{{ cursa }}', '{{ viteza }}', '{{ lungime }}', '{{ tensiune }}','{{ descriere }}', '{{ descriereText }}', '{{ images }}', '{{ price }}'],
            [$productArray['image'], $productArray['title'], $productArray['cod'], $productArray['capacitate'], $productArray['cursa'], $productArray['viteza'], $productArray['lungime'], $productArray['tensiune'], $productArray['descriere'], $descriere2, $images, $productArray['price']], $file);
        $product[] = $file;
        return implode('', $product);
    }else {
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
}

function buildProductEchipamenteByName(array $productArray, array $descriptionArray)
{
    $product = [];
    $file = file_get_contents('assets/html/productBody3.html');
    $descriere = descriere3($descriptionArray);
    $images = images($productArray);
    $file = str_replace(
        ['{{ image }}', '{{ title }}', '{{ price }}', '{{ descriere }}', '{{ descriereText }}', '{{ images }}'],
        [$productArray['image'], $productArray['title'], $productArray['price'], $productArray['descriere'], $descriere, $images], $file);
    $product[] = $file;
    return implode('', $product);
}

function images(array $productArray)
{
    $images = [];
    if (is_array($productArray) || is_object($productArray)) {
        foreach ($productArray['images'] as $value) {
            $img = file_get_contents('assets/html/image.html');
            $img = str_replace(['{{ image }}', '{{ title }}'], [$value, $productArray['title']], $img);
            $images[] = $img;
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

function descriere3(array $descriptionArray)
{
    $descriere = [];
    if (is_array($descriptionArray) || is_object($descriptionArray)) {
        foreach ($descriptionArray as $innerArray) {
            if (is_array($innerArray) || is_object($innerArray)) {
                foreach ($innerArray as $key => $value) {
                    $file = file_get_contents('assets/html/descriereProduct3.html');
                    $file = str_replace('{{ descriere }}', $value, $file);
                    $descriere[$key] = $file;
                }
            }
        }
    }
    return implode('', $descriere);
}

function descriere2(array $descriptionArray)
{
    $descriere = [];
    if (is_array($descriptionArray) || is_object($descriptionArray)) {
        foreach ($descriptionArray as $innerArray) {
            if (is_array($innerArray) || is_object($innerArray)) {
                foreach ($innerArray as $key => $value) {
                    $file = file_get_contents('assets/html/descriereProduct2.html');
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
            if (array_key_exists("meta", $value)) {
                $metaArray = $value['meta'];
            }
        }
    }
    return $metaArray;
}

function buildMeta($metaArray)
{
    if (is_array($metaArray) || is_object($metaArray)) {
        $metaArray = $metaArray['meta'];
        $file = file_get_contents('assets/html/meta.html');
        $file = str_replace(['{{ title }}', '{{ url }}', '{{ description }}'], [$metaArray['title'], $metaArray['url'], $metaArray['description']], $file);
        return $file;
    }
    return null;
}

function getCategory(array $category, string $categoryTitle)
{
    $file = file_get_contents('assets/html/echipamente.html');
    if (is_array($category) || is_object($category)) {
        foreach ($category as $key => $innerArray) {
            if (is_array($innerArray) || is_object($innerArray)) {
                if ($key == $categoryTitle){
                    foreach ($innerArray as $value){
                        if (array_key_exists("img", $value) &&
                            array_key_exists("title", $value) &&
                            array_key_exists("category", $value)){
                            $file2 = file_get_contents('assets/html/category-card.html');
                            $file2 = str_replace(['{{ img }}', '{{ title }}', '{{ category }}'], [$value['img'], $value['title'], $value['category']], $file2);
                            $categoryArray[] = $file2;
                        }
                    }
                }
            }
        }
    }
    $categoryArray = implode('', $categoryArray);
    $file = str_replace('{{ category }}', $categoryArray, $file);

    return $file;
}

function buildMetaCategory(array $category, string $getCategory)
{
    $category = $category[$getCategory];
    if (array_key_exists("meta", $category)) {
        $metaArray = $category['meta'];
        $file = file_get_contents('assets/html/meta.html');
        $file = str_replace(['{{ title }}', '{{ url }}', '{{ description }}'], [$metaArray['title'], $metaArray['url'], $metaArray['description']], $file);
        return $file;
    }
    return null;
}

function buildMetaCategories($metaArray){
    $file = file_get_contents('assets/html/meta.html');
    $file = str_replace(['{{ title }}', '{{ url }}', '{{ description }}'], [$metaArray['title'], $metaArray['url'], $metaArray['description']], $file);
    return $file;
}
