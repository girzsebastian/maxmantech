<?php

    // Sebi 01.10.2020 (Start)

    require_once "assets/php/functions.php";

    $html = file_get_contents('assets/html/index.html');
    $topBar = file_get_contents('assets/html/topBar.html');
    $footer = file_get_contents('assets/html/footer.html');
    $header = file_get_contents('assets/html/header.html');
    $clients = file_get_contents('assets/html/clients.html');

    $html = str_replace("{{ topBar }}", $topBar, $html);
    $html = str_replace("{{ header }}", $header, $html);
    $html = str_replace("{{ clients }}", $clients, $html);
    $html = str_replace("{{ footer }}", $footer, $html);


    echo $html;

    // Sebi 01.10.2020 (End)

