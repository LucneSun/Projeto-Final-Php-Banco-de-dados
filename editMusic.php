<?php
    require_once("repository/MusicRepository.php");
    session_start();
    $music_id = $_SESSION['id'];

    $link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_URL);
    $type = filter_input(INPUT_POST, 'youtube/soundcloud', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($link) || empty($type) || empty($music_id))
    {
    $msg = "Preencha todas seções";
    }
    else{
        if(fnUpdateMusic($link, $type, $music_id)){
            $msg = "Sucesso ao editar";
        }
        else{
            $msg = "Falha na edição";
        }
    }

    setcookie('notify', $msg, time() + 1);
    header("location: manage_playlists.php");
    exit;
?>