<?php
    require_once('repository/PlaylistRepository.php');
    $name = filter_input(INPUT_POST, 'searchName', FILTER_SANITIZE_SPECIAL_CHARS);

    header("location: search.php?searchName={$name}");
    exit;