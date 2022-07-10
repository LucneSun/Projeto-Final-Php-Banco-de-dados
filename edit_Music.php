<?php
    include('config.php');
    require_once('repository/MusicRepository.php');

    $music = fnLocateMusicByID($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Editar Música</title>
        <meta charset= "UTF-8"/>
        <meta name= "viewport" content= "width= device-width, initial-scale= 1.0"/>
        <link rel="stylesheet" type="text/css" href="css/mainnav.css"/>
        <link rel="stylesheet" type="text/css" href="css/create-playlist.css"/>
    </head>

    <body>
        <!--nav bar here-->
        <header class="mainnav">
            <nav>
                <ul>
                    <a href='config_page.php'><img src="<?= $_SESSION['login']->photo_link?>" alt="profile picture"/></a>
                    <a style='text-decoration: none; color: white;' href='search.php'><li>Pesquisar</li></a>
                    <a style='text-decoration: none; color: white;' href='manage_playlists.php'><li>Gerenciar Playlists</li></a>
                    <a href="logout.php" style='text-decoration: none; color: white;' ><li>Sair</li></a>
                </ul>
            </nav>
        </header>
    
        <br>

        <div class="create-form" style="margin-top: 5%;">
           <form action="editMusic.php" method="post">
                <section>
                    <label>Alterar Link: <input name="link" type="text" maxlength="240" style="margin-left: 23%;" value="<?= $music->link ?>" required></label>
                    <br>
                    <label>Youtube: <input name="youtube/soundcloud" value="you" type="radio" checked></label>
                    <label>SoundCloud: <input name="youtube/soundcloud" value="soun" type="radio" ></label>
                    <br>
                    <input type="submit" value="Editar" style="margin: 6% 0 2% 24%;">     
                </section>
           </form>
        </div>
        <div style="display: flex;
    color: white;
    font-family: consolas;
    font-size: 4vh;
    width: 500px;
    margin: auto;" id="notify"><h1><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></h1></div>
    </body>

</html>