<?php
    include('config.php');
    require_once("repository/PlaylistRepository.php");
    $name = filter_input(INPUT_GET, 'searchName', FILTER_SANITIZE_SPECIAL_CHARS);
    $mine = isset($_POST['submit']) ? $_POST['mine'] : 0; 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Pesquisar</title>
    <meta charset= "UTF-8"/>
    <meta name= "viewport" content= "width= device-width, initial-scale= 1.0"/>

    <link rel="stylesheet" type="text/css" href="css/mainnav.css"/>
    <link rel="stylesheet" type="text/css" href="css/player.css"/>
    <link rel="stylesheet" type="text/css" href="css/search.css"/>
</head>

<body>
    <!--nav bar here-->
    <header class="mainnav">
        <nav>
            <ul>
                <a><img src="<?= $_SESSION['login']->photo_link?>" alt="profile picture"/></a>
                <a><li style="color: grey;">Pesquisar</li></a>
                <a style='text-decoration: none; color: white;' href='manage_playlists.php'><li>Gerenciar Playlists</li></a>
                <a><li>Configurações</li></a>
                <a href="logout.php" style='text-decoration: none; color: white;' ><li>Sair</li></a>
            </ul>
        </nav>
    </header>

    <br>

    <div class="search-menu">
        <form id='searchFormID' method='post' action='searchPlaylistByName.php'>
            <section>
                <input id='searchID' name='searchName' type="text" class="search-bar"/>
                <input type="submit"value="Pesquisar" class="search-btn"/>
            </section>
            <br>
            <section class="filters">
                <label> Minhas<input type="checkbox" name='mine'/></label>
                <label> Mais Novas<input type="radio" name='oldNew' value='new'/></label>
                <label> Mais Antigas<input type="radio" name='oldNew' value='old'/></label>
            </section>
        </form>
    </div>

    <br>

    <?php foreach(fnListPlaylistByName($name, $_SESSION['login']->id,$mine) as $playlist):?>
        <!--player-->
        <div class="music-player">
            <h1><?= $playlist->playlist_name?></h1>
            <br>
            <img src=<?= $playlist->image_link ?> />
            <br>
            <p><?= $playlist->playlist_description?></p>
            <!--Music loop-->
            <iframe src="https://www.youtube.com/embed/z4Qrc3LwFP0?loop=1&rel=0&color=white" width="500" height="100" frameborder="0"></iframe>
            <br>
            <iframe src="https://www.youtube.com/embed/z4Qrc3LwFP0?loop=1&rel=0&color=white" width="500" height="100" frameborder="0"></iframe>
            <br>
            <iframe width="100%" height="100" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/881574916&color=%23343633&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/seagaia" title="Melos Han-Tani" target="_blank" style="color: #cccccc; text-decoration: none;"> <a href="https://soundcloud.com/seagaia/new-game-s-2020-07-20-presence-draft-2title" title="New Game S - 2020-07-20 - presence draft 2/title" target="_blank" style="color: #cccccc; text-decoration: none;"></a></div>
        </div>
    <?php endforeach; ?>

    <?php include("rodape.php") ?>
    <script>
</body>

</html>