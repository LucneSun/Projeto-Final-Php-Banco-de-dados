<?php
    require_once('repository/UserRepository.php');

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $page = "listagem_de_usuarios.php";

    if(fnDeleteUsuario($id)){
        $msg = "Sucesso ao apagar";
    }
    else{
        $msg = "Falha ao apagar";
    }

    setcookie('notify', $msg, time() + 10, "site_mmo/{$page}", 'localhost');
     #redirect para a pagina
     header("location: {$page}");
     exit;
?>