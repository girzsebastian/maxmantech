<?php

    require_once "assets/php/functions.php";

    $services=file_get_contents('assets/html/services.html');
    $topBar=file_get_contents('assets/html/topBar.html');
    $about=file_get_contents('assets/html/aboutSection.html');
    $header=file_get_contents('assets/html/header.html');
    $serviceSection=file_get_contents('assets/html/serviceSection.html');
    $footer=file_get_contents('assets/html/footer.html');

    $services=str_replace('{{ topBar }}', $topBar, $services);
    $services=str_replace('{{ header }}', $header, $services);
    $services=str_replace('{{ service }}', $serviceSection, $services);
    $services=str_replace('{{ about }}', $about, $services);
    $services=str_replace('{{ footer }}', $footer, $services);

    echo $services;



?>