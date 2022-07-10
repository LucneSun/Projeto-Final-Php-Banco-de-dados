<?php
    require_once("repository/UsersRepository.php");
    require_once('utils/base64.php');
    session_start();


    $my_name = filter_input(INPUT_POST, 'myName', FILTER_SANITIZE_SPECIAL_CHARS);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'myPassword', FILTER_SANITIZE_SPECIAL_CHARS);    

    $photo = convertBase64($_FILES['file']);
    $page = 'errorPage.php';

    if (empty($my_name) || empty($age) || empty($email) || empty($password) || empty($photo))
        $msg= "Preencher todos os campos.";
    else{
        if(fnAddUser($my_name, $age, $email, $password, $photo)){
            $msg = "Sucesso ao criar";
            $page = 'index.php';
        }   
        else{
            $msg = "Falha ao criar";
        }
    }

    setcookie('notify', $msg, time() + 1);
    header("location: {$page}");
    exit;
?>