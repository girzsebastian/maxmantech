<?php
    require_once "assets/php/functions.php";

    $html = file_get_contents('assets/html/index.html');
    $topBar = file_get_contents('assets/html/topBar.html');
    $footer = file_get_contents('assets/html/footer.html');
    
    $html = str_replace("{{ topBar }}", $topBar, $html);
    $html = str_replace("{{ footer }}", $footer, $html);


    echo $html;

