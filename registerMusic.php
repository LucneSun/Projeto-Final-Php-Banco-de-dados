<?php
    require_once("repository/MusicRepository.php");
    session_start();

    $link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_URL);
    $type = filter_input(INPUT_POST, 'youtube/soundcloud', FILTER_SANITIZE_SPECIAL_CHARS);
    $created_by = $_SESSION['id'];

    if (empty($link) || empty($type) || empty($created_by))
        $msg= "Preencher todos os campos.";
    else{
        if(fnAddMusic($link, $type, $created_by)){
            $msg = "Sucesso ao gravar";
        }   
        else{
            $msg = "Falha na gravação";
        }
    }

    setcookie('notify', $msg, time() + 1);
    header("location: create_music.php");
    exit;
?>