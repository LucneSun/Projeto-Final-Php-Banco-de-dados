<?php
    session_start();
    require_once("repository/UsersRepository.php");

    $my_name = filter_input(INPUT_POST, 'myName', FILTER_SANITIZE_SPECIAL_CHARS);
    $my_password = filter_input(INPUT_POST, 'myPassword', FILTER_SANITIZE_SPECIAL_CHARS);

    $page = "search.php";
    if(!$_SESSION['login'] = fnLogin($my_name, $my_password)){
       $page= "errorPage.php";
       $expire = (time() + 20);
       setcookie('notify', 'Falha no login', $expire);
    }

    header("location: {$page}");
    exit;
?>