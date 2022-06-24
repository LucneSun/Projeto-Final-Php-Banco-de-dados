<?php
    require_once('repository/UserRepository.php');
    $nome = filter_input(INPUT_POST, 'nomeUsuario', FILTER_SANITIZE_SPECIAL_CHARS);

    header("location: listagem_de_usuarios.php?nome={$nome}");
    exit;

