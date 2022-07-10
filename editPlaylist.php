<?php
     require_once("repository/PlaylistRepository.php");
     require_once('utils/base64.php');
     session_start();
 
 
     $playlist_name = filter_input(INPUT_POST, 'playlistName', FILTER_SANITIZE_SPECIAL_CHARS);
     $playlist_description = filter_input(INPUT_POST, 'playlistDescription', FILTER_SANITIZE_SPECIAL_CHARS);
     $playlist_id = $_SESSION['id'];  
     $photo = convertBase64($_FILES['file']);
     $page = 'edit_playlist.php';
     
     if (empty($playlist_name) || empty($playlist_description) || empty($photo) || empty($playlist_id))
         $msg= "Preencher todos os campos.";
     else{
         if(fnUpdatePlaylist($playlist_id, $playlist_name, $photo, $playlist_description)){
             $msg = "Sucesso ao criar";
         }   
         else{
             $msg = "Falha ao criar";
         }
     }
 
     setcookie('notify', $msg, time() + 1);
     header("location: {$page}");
     exit;
?>