<?php
    require_once('repository/PlaylistRepository.php');
    $name = filter_input(INPUT_POST, 'searchName', FILTER_SANITIZE_SPECIAL_CHARS);
    $mine = filter_input(INPUT_POST, 'mine', FILTER_SANITIZE_SPECIAL_CHARS);
    $old_new = filter_input(INPUT_POST, 'oldNew', FILTER_SANITIZE_SPECIAL_CHARS);

    header("location: search.php?searchName={$name}&mine={$mine}&oldNew={$old_new}");
    exit;