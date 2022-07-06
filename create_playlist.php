<?php
    include('config.php');?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Criar Playlist</title>
        <meta charset= "UTF-8"/>
        <meta name= "viewport" content= "width= device-width, initial-scale= 1.0"/>
        <link rel="stylesheet" type="text/css" href="css/mainnav.css"/>
        <link rel="stylesheet" type="text/css" href="css/search.css"/>
        <link rel="stylesheet" type="text/css" href="css/create-playlist.css"/>
    </head>

    <body>
        <!--nav bar here-->
        <header class="mainnav">
            <nav>
                <ul>
                    <a><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvQuK69ktD3fOvpzBI9UwzjmbaWq6r0enmbojzvgP-5kbt6783RjNwFUROaSq9jHdJXqA&usqp=CAU" alt="profile picture"/></a>
                    <a style='text-decoration: none; color: white;' href='search.php'><li>Pesquisar</li></a>
                    <a style='text-decoration: none; color: white;' href='manage_playlists.php'><li>Gerenciar Playlists</li></a>
                    <a><li>Configurações</li></a>
                    <a href="logout.php" style='text-decoration: none; color: white;' ><li>Sair</li></a>
                </ul>
            </nav>
        </header>
    
        <br>

        <div class="create-form" style="margin-top: 5%;">
           <form action="registerPlaylist.php" method="post" enctype="multipart/form-data">
                <section>
                    <label>Nome: <input name="playlistName" type="text" maxlength="100" style="margin-left: 6%;" required></label>
                    <br>
                    <div>
                    <svg width="100%" height="180" role="img" aria-label="Placeholder: Foto" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Foto</text>
                    </svg>
                    </div>
                    <!--onchange="loadFile(event)" -->
                    <label for="imgBase64">Imagem: </label>
                    <input id='imgBase64' name='file' type="file" required>
                    <br>
                    <label>Descrição: <input name="playlistDescription" type="text" maxlength="280" style="margin-left: 1%;" required></label>
                    <br>
                    <input type="submit" value="Criar" style="margin: 6% 0 2% 24%;">     
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

    <!--
    <script>
        var loadFile = function(event)
        {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
    -->
    </body>

</html>