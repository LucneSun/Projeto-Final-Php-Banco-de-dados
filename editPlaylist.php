<?php
    require_once("repository/PlaylistRepository.php");
    require_once('utils/base64.php');
    session_start();
    $playlist_id = $_SESSION['id'];

    $playlist_name = filter_input(INPUT_POST, 'playlistName', FILTER_SANITIZE_SPECIAL_CHARS);
    $playlist_description = filter_input(INPUT_POST, 'playlistDescription', FILTER_SANITIZE_SPECIAL_CHARS);

    $photo = convertBase64($_FILES['file']);
    if (empty($playlist_id) || empty($playlist_name) || empty($photo) || empty($playlist_description))
    {
    $msg = "Preencha todas seções";
    }
    else{
        if(fnUpdatePlaylist($playlist_id, $playlist_name, $photo, $playlist_description)){
            $msg = "Sucesso ao editar";
        }
        else{
            $msg = "Falha na edição";
        }
    }

    setcookie('notify', $msg, time() + 10);
    header("location: edit_playlist.php");
    exit;
?>