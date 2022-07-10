<?php
    include('config.php');
    require_once("repository/PlaylistRepository.php");
    require_once("repository/MusicRepository.php");
    $name = filter_input(INPUT_GET, 'searchName', FILTER_SANITIZE_SPECIAL_CHARS);
    $mine = filter_input(INPUT_GET, 'mine', FILTER_SANITIZE_SPECIAL_CHARS);
    $old_new = filter_input(INPUT_GET, 'oldNew', FILTER_SANITIZE_SPECIAL_CHARS);
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
                <a href='config_page.php'><img src="<?= $_SESSION['login']->photo_link?>" alt="profile picture"/></a>
                <a><li style="color: grey;">Pesquisar</li></a>
                <a style='text-decoration: none; color: white;' href='manage_playlists.php'><li>Gerenciar Playlists</li></a>
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
                <label> Minhas<input type="checkbox" name='mine' value='mine'/></label>
                <label> Mais Novas<input type="radio" name='oldNew' value='desc' checked/></label>
                <label> Mais Antigas<input type="radio" name='oldNew' value='ASC'/></label>
            </section>
        </form>
    </div>

    <br>

    <?php foreach(fnListPlaylistByName($name, $_SESSION['login']->id,($mine) ? 1 : 0, $old_new) as $playlist):?>
        <!--player-->
        <div class="music-player">
            <h1><?= $playlist->playlist_name?></h1>
            <br>
            <img src=<?= $playlist->image_link ?> />
            <br>
            <p><?= $playlist->playlist_description?></p>
            <!--Music loop-->

            <?php foreach(fnListMusicByType('', $playlist->playlist_id, 'you') as $music):?>          
                <iframe src="<?= $music->link?>?modestbranding=1&rel=0&iv_load_policy=3&fs=0&color=white&disablekb=1" width="500" height="300" title="Youtube Video" frameborder="0"></iframe>
            <?php endforeach; ?>
            <br>

            <?php foreach(fnListMusicByType('', $playlist->playlist_id, 'sou') as $music):?>
            <iframe width="500" height="100" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?=$music->link?>&color=%23343633&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="" title="" target="_blank" style="color: #cccccc; text-decoration: none;"> <a href="" title="" target="_blank" style="color: #cccccc; text-decoration: none;"></a></div>
            <?php endforeach; ?>

        </div>
    <?php endforeach; ?>

    <?php include("rodape.php") ?>
    <script>
</body>

</html>