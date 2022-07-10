<?php
    include('config.php');
    require_once('repository/UsersRepository.php');

    $user = fnLocateUserByID($_SESSION['login']->id);
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Usuário</title>
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
                    <a><img style='border: none;' src="<?= $_SESSION['login']->photo_link?>" alt="profile picture"/></a>
                    <a style='text-decoration: none; color: white;' href='search.php'><li>Pesquisar</li></a>
                    <a style='text-decoration: none; color: white;' href='manage_playlists.php'><li>Gerenciar Playlists</li></a>
                    <a href="logout.php" style='text-decoration: none; color: white;' ><li>Sair</li></a>
                </ul>
            </nav>
        </header>
    
        <br>
        
        <div class="create-form" style="margin-top: 5%;">
           <form action="editUser.php" method="post" enctype="multipart/form-data">
                <section>
                    <label>Login: <input name="myName" type="text" maxlength="100" style="margin-left: 1%;" value="<?=$user->my_name ?>" required></label>
                    <br>
                    <div>
                    <img name="previewImg" class="previewImg" src="<?= $user->photo_link ?>" id="avatarId" class="rounded" alt="foto do usuário">
                    </div>
                    <!--onchange="loadFile(event)" -->
                    <label for="imgBase64">Imagem: </label>
                    <input id='imgBase64' name='file' type="file" required>
                    <br>
                    <label>Idade: <input name="age" type="int" maxlength="3" style="margin-left: 1%;" value="<?=$user->age ?>" required></label>
                    <br>
                    <label>Email: <input name="email" type="email" maxlength="200" style="margin-left: 1%;" value="<?=$user->email ?>" required></label>
                    <br>
                    <label>Senha: <input name="myPassword" type="password" maxlength="200" style="margin-left: 1%;"  required></label>
                    <br>
                    <input type="submit" value="Editar" style="margin: 6% 0 2% 24%;">  
                    <input style="margin: 6% 0 2% 24%;" type="button" value="Excluir" onclick="return confirm('Deseja realmente excluir?') ? deleteUser() : '';" href="index.php">
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
    <script>
         function deleteUser(){

                url = 'deleteUser.php';

                window.location.href = url;
        }
    </script>
    </body>

</html>