<?php
    require_once('repository/UserRepository.php');

    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_NUMBER_INT);

    $msg = "";

    if(fnAddUsuario($login, $nome, $email, $senha)){
        $msg = "Sucesso ao gravar";
    }
    else{
        $msg = "Falha na gravação";
    }

     #redirect para a pagina
     header("location: formulario-cadastro-usuario.php?notify={$msg}");
     exit;
?>