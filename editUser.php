<?php
    require_once("repository/UsersRepository.php");
    require_once('utils/base64.php');
    session_start();

    $my_name = filter_input(INPUT_POST, 'myName', FILTER_SANITIZE_SPECIAL_CHARS);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $my_password = filter_input(INPUT_POST, 'myPassword', FILTER_SANITIZE_SPECIAL_CHARS);
    $photo_link = convertBase64($_FILES['file']);

    $id = $_SESSION['login']->id;

    if(empty($my_name) || empty($age) || empty($email) || empty($my_password) || empty($photo_link))
    {
    $msg = "Preencha todas seções";
    }
    else{
        if(fnUpdateUser($id, $my_name, $age, $my_password, $photo_link)){
            $msg = "Sucesso ao editar";
            
        session_destroy();
        header("location: index.php");
        exit;
        }
        else{
            $msg = "Falha na edição";
        }
    }
    

    setcookie('notify', $msg, time() + 1);
    header("location: config_page.php");
    exit;
?>