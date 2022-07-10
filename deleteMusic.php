<?php
    require_once("repository/MusicRepository.php");
    session_start();

    $msg = 'Falha ao apagar';
    $page = 'manage_playlists.php';
    if(fnDeleteMusic($_SESSION['id'])){
        $msg = "Sucesso ao apagar";
    }

    unset($_SESSION['id']);

    setcookie('notify', $msg, time() + 1, "/playlist_share/{$page}", 'localhost');
    header("location: {$page}");
    exit;
?>