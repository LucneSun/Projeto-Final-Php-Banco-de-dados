<?php
    require_once("repository/PlaylistRepository.php");
    require_once('utils/base64.php');
    session_start();

    $playlist_name = filter_input(INPUT_POST, 'playlistName', FILTER_SANITIZE_SPECIAL_CHARS);
    $playlist_description = filter_input(INPUT_POST, 'playlistDescription', FILTER_SANITIZE_SPECIAL_CHARS);
    $created_by = $_SESSION['login']->id;

    $photo = convertBase64($_FILES['file']);

    if (empty($playlist_name) || empty($playlist_description) || empty($created_by) || empty($photo))
        $msg= "Preencher todos os campos.";
    else{
        if(fnAddPlaylist($playlist_name, $photo, $playlist_description, $created_by)){
            $msg = "Sucesso ao gravar";
        }   
        else{
            $msg = "Falha na gravação";
        }
    }

    setcookie('notify', $msg, time() + 10);
    header("location: create_playlist.php");
    exit;
?>