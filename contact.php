<?php

    require_once "assets/php/functions.php";

    $html=file_get_contents('assets/html/contact.html');
    $topBar=file_get_contents('assets/html/topBar.html');
    $header=file_get_contents('assets/html/header.html');
    $footer=file_get_contents('assets/html/footer.html');
    $formContact=file_get_contents('assets/html/formContact.html');

    $html=str_replace("{{ topBar }}", $topBar, $html);
    $html=str_replace("{{ header }}", $header, $html);
    $html=str_replace("{{ formContact }}", $formContact, $html);
    $html=str_replace("{{ footer }}", $footer, $html);

    echo $html;

?>

