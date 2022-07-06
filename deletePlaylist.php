<?php
    require_once("repository/PlaylistRepository.php");
    session_start();

    $msg = 'Falha ao apagar';
    $page = 'manage_playlists.php';
    if(fnDeletePlaylist($_SESSION['id'])){
        $msg = "Sucesso ao apagar";
    }

    unset($_SESSION['id']);

    setcookie('notify', $msg, time() + 10, "/playlist_share/{$page}", 'localhost');
    header("location: {$page}");
    exit;
?>