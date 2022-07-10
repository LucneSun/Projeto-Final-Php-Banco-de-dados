<?php
    include('config.php');
    require_once('repository/PlaylistRepository.php');

    $playlist = fnLocatePlaylistByID($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Editar Playlist</title>
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
           <form action="editPlaylist.php" method="post" enctype="multipart/form-data">
                <section>
                    <input type="hidden" name="playlistID" value=<?=$playlist->playlist_id?>/>
                    <label>Alterar Nome: <input name="playlistName" type="text" maxlength="240" style="margin-left: 23%;" value="<?= $playlist->playlist_name ?>" required></label>
                    <br>
                    <div>
                    <img name="previewImg" class="previewImg" src="<?= $playlist->image_link ?>" id="avatarId" class="rounded" alt="foto do usuário">
                    </div>
                    <!--onchange="loadFile(event)" -->
                    <label for="imgBase64">Imagem: </label>
                    <input id='imgBase64' name="file" type="file">
                    <br> 
                    <label>Alterar Descrição: <input name="playlistDescription" type="text" maxlength="240" style="margin-left: 23%;" value="<?= $playlist->playlist_description ?>" required></label>
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

    <?php include("rodape.php") ?>
    <script src="js/base64.js"></script>
    </body>

</html>