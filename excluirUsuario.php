<?php
    require_once('repository/UserRepository.php');
    session_start();

    if(fnDeleteUsuario($_SESSION['id'])){
        $msg = "Sucesso ao apagar";
    }
    else{
        $msg = "Falha ao apagar";
    }

    unset($_SESSION['id']);

    $page = "listagem_de_usuarios.php";
    setcookie('notify', $msg, time() + 10, "site_mmo/{$page}", 'localhost');
    header("location: {$page}");
    exit;
?>