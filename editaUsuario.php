<?php
    require_once('repository/UserRepository.php');

    $id = filter_input(INPUT_POST, 'idUsuario', FILTER_SANITIZE_NUMBER_INT);
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_NUMBER_INT);

    $msg = "";

    if(fnUpdateUsuario($id, $login, $nome, $email, $senha)){
        $msg = "Sucesso ao gravar";
    }
    else{
        $msg = "Falha na gravação";
    }

     #redirect para a pagina
     header("location: formulario-edita-usuario.php?notify={$msg}&id=$id");
     exit;
?>