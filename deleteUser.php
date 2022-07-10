<?php
    require_once("repository/UsersRepository.php");
    session_start();

    $msg = 'Falha ao apagar';
    $page = 'index.php';
    if(fnDeleteUser($_SESSION['login']->id)){
        $msg = "Sucesso ao apagar";
    }
    else{
        $msg= "Erro ao apagar";
    }

    session_destroy();
    setcookie('notify', $msg, time() + 1, "/playlist_share/{$page}", 'localhost');
    header("location: {$page}");
    exit;
?>