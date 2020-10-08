<?php
    function buildBreadcrumbs($array, $title){
        $file = file_get_contents('assets/html/breadcrumbsUtilaje.html');
        $file = str_replace('{{ title }}', $title, $file);
        return $file;
    }
    function getCategoryByName($category, $array){
        $categoryArray = [];
        foreach ($array['products'] as $key => $value){
            if ($key === $category){
                $categoryArray[] = $value;
            }
        }
        return $categoryArray;
    }
    function buildCategoryByName($categoryArray){
        $category= [];
        foreach($categoryArray as $innerArray){
            foreach($innerArray as $key => $value) {
                $file = file_get_contents('assets/html/productCard.html');
                $file = str_replace(
                    ['{{ image }}', '{{ title }}', '{{ cod }}', '{{ putere }}', '{{ greutate }}', '{{ id }}'],
                    [$value['image'], $value['title'], $value['cod'], $value['putere'], $value['greutate'], $value['id']], $file);
                $category[$key] = $file;
            }
        }
        return implode('', $category);
    }
    function buildUtilajeBreadcrumbs($category){
        $file = file_get_contents('assets/html/breadcrumbsUtilaje.html');
        $file = str_replace('{{ title }}', $category, $file);
        return $file;
    }
    function getProductById($product, $array){
        return '';
    }