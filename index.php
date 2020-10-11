<?php
    require_once "assets/php/functions.php";

    $html = file_get_contents('assets/html/index.html');
    $topBar = file_get_contents('assets/html/topBar.html');
    $footer = file_get_contents('assets/html/footer.html');
    $header = file_get_contents('assets/html/header.html');
    $clients = file_get_contents('assets/html/clients.html');
    $testimonials = file_get_contents('assets/html/testimonials.html');
    $aboutSection = file_get_contents('assets/html/aboutSection.html');
    $hero = file_get_contents('assets/html/hero.html');
    $serviceSection = file_get_contents('assets/html/serviceSection.html');
    $contact = file_get_contents('assets/html/formContact.html');


    $html = str_replace("{{ topBar }}", $topBar, $html);
    $html = str_replace("{{ header }}", $header, $html);
    $html = str_replace('{{ hero }}', $hero, $html);
    $html = str_replace('{{ service }}', $serviceSection, $html);
    $html = str_replace('{{ about }}', $aboutSection, $html);
    $html = str_replace("{{ testimonials }}", $testimonials, $html);
    $html = str_replace("{{ clients }}", $clients, $html);
    $html = str_replace("{{ contact }}", $contact, $html);
    $html = str_replace("{{ footer }}", $footer, $html);


    echo $html;
