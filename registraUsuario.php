<?php
    require_once('repository/UserRepository.php');

    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    $page = "formulario-cadastro-usuario.php";

    if(fnAddUsuario($login, $nome, $email)){
        $msg = "Sucesso ao gravar";
    }
    else{
        $msg = "Falha na gravação";
    }

    setcookie('notify', $msg, time() + 10, "site_mmo/{$page}", 'localhost');

     #redirect para a pagina
     header("location: {$page}");
     exit;
?>