<?php
    require_once('repository/UserRepository.php');

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $msg = "";

    if(fnDeleteUsuario($id)){
        $msg = "Sucesso ao apagar";
    }
    else{
        $msg = "Falha ao apagar";
    }

     #redirect para a pagina
     header("location: listagem_de_usuarios.php?notify={$msg}");
     exit;
?>