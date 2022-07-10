<?php
    require_once('utils/send_email.php'); 
    require_once('repository/UsersRepository.php');

    date_default_timezone_set('America/Sao_Paulo');

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $newPass = sha1(uniqid("playlist_share_") . date('Y-m-d H:i'));

    if(fnUpdatePassword($email, $newPass)){
        $user = new stdClass();
        $user->email = $email;
        $user->password = $newPass;
        send($user);
    }
