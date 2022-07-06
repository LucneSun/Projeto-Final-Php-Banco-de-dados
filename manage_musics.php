<?php 
    include('config.php');
    require_once("repository/MusicRepository.php");
    $my_playlist_id = filter_input(INPUT_GET, 'myPlaylistID', FILTER_SANITIZE_NUMBER_INT);
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Gerenciar Músicas</title>
        <meta charset= "UTF-8"/>
        <meta name= "viewport" content= "width= device-width, initial-scale= 1.0"/>
        <link rel="stylesheet" type="text/css" href="css/mainnav.css"/>
        <link rel="stylesheet" type="text/css" href="css/search.css"/>
        <link rel="stylesheet" type="text/css" href="css/manage-playlists.css"/>
    </head>

    <body>
        <!--nav bar here-->
        <header class="mainnav">
            <nav>
                <ul>
                    <a><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvQuK69ktD3fOvpzBI9UwzjmbaWq6r0enmbojzvgP-5kbt6783RjNwFUROaSq9jHdJXqA&usqp=CAU" alt="profile picture"/></a>
                    <a style='text-decoration: none; color: white;' href='search.php'><li>Pesquisar</li></a>
                    <a><li style="color: grey;">Gerenciar Playlists</li></a>
                    <a><li>Configurações</li></a>
                    <a><li>Sair</li></a>
                </ul>
            </nav>
        </header>
    
        <br>

        <?php if(!fnListMusic()) echo "<h1 class='message'> A playlist ainda não tem uma música</h1>"; else echo "<h1 class='message'> Músicas</h1>"?>
        <div class="list_of_playlist">
            <table>
                <tbody>
                    <?php foreach(fnListMusic() as $music) :?>
                    <tr>
                        <td style="padding-right: 10px;"><?= $music->playlist_id?></td>
                        <td><?= $playlist->playlist_name?></td>
                        <td><?= $playlist->created_at?></td>
                        <td class="btn"><a href="edit_playlist.php?playlistID=<?= $playlist->playlist_id ?>">Editar</a></td>
                        <td class="btn"><a href="">Músicas</a></td>
                        <td class="btn"><a onclick="return confirm('Deseja realmente excluir?');" href="deletePlaylist.php?playlistID=<?= $playlist->playlist_id ?>">Excluir</a></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>

        <br>
        <hr>
        <br>

        <div class="create-btn">
            <a style="text-decoration: none;" href='create_music.php'><button>Criar Música</button></a>
        </div>

    </body>

</html>