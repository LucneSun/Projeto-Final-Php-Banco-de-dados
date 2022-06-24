<?php
    require_once('repository/UserRepository.php');
    session_start();

    $id = filter_input(INPUT_POST, 'idUsuario', FILTER_SANITIZE_NUMBER_INT);
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    $page = "formulario-edita-usuario.php";

    if(fnUpdateUsuario($id, $login, $nome, $email)){
        $msg = "Sucesso ao editar";
    }
    else{
        $msg = "Falha ao editar";
    }

    $_SESSION['id'] = $id;
    setcookie('notify', $msg, time() + 10, "site_mmo/{$page}", 'localhost');
     #redirect para a pagina
     header("location: {$page}");
     exit;
?>