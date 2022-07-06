<?php
    session_start();
    date_default_timezone_set('America/Sao_Paulo');

    if(!array_key_exists('login', $_SESSION) || empty(isset($_SESSION['login'])))
    {
        header("location: errorPage.php?notify=acesso-negado");
        exit;
    }
