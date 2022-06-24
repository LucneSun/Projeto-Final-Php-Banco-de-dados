<?php
    session_start();

    require_once('repository/UserRepository.php');

    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    $page = "home.php";

    if(!$_SESSION['login'] = fnLogin($login, $email))
    {
        $page = "errorPage.php";
        setcookie('notify', "falha ao efetuar login", time() + 20, "site_mmo/{$page}", 'localhost', isset($_SERVER['HTTPS']), true);
    }

    header("location: {$page}");
    exit;
    