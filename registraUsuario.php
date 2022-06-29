<?php
    require_once('repository/UserRepository.php');

    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    if(empty($nome) || empty($email) || empty($login))
    {
        $msg = "Preencher todos os campos primeiro.";
    }
    else{
        if(fnAddUsuario($login, $nome, $email)){
            $msg = "Sucesso ao gravar";
        }
        else{
            $msg = "Falha na gravação";
        }
    }

    $page = "formulario-cadastro-usuario.php";

    setcookie('notify', $msg, time() + 10, "site_mmo/{$page}", 'localhost');

     #redirect para a pagina
     header("location: {$page}");
     exit;
?>