<?php 
    include('config.php');
    require_once("repository/PlaylistRepository.php");
    $notify = filter_input(INPUT_GET, 'notify', FILTER_SANITIZE_SPECIAL_CHARS);
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Gerenciar Playlists</title>
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
                    <a href="logout.php" style='text-decoration: none; color: white;' ><li>Sair</li></a>
                </ul>
            </nav>
        </header>

        <?php if(!fnListPlaylist()) echo "<h1 class='message'> Você ainda não tem uma playlist</h1>"; else echo "<h1 class='message'> Minhas Playlists</h1>"?>
        <div class="list_of_playlist">
            <table>
                <tbody>
                    <?php foreach(fnListPlaylistByName('', $_SESSION['login']->id, 1) as $playlist) :?>
                    <tr>
                        <td style="padding-right: 10px;"><?= $playlist->playlist_id?></td>
                        <td><?= $playlist->playlist_name?></td>
                        <td><?= $playlist->created_at?></td>
                        <td class="btn"><a href="#" onclick="gerirPlaylist(<?= $playlist->playlist_id ?>, 'edit')">Editar</a></td>
                        <td class="btn"><a href="#" onclick="gerirPlaylist(<?= $playlist->playlist_id ?>, 'musics')">Músicas</a></td>
                        <td class="btn"><a onclick="return confirm('Deseja realmente excluir?') ? gerirPlaylist(<?= $playlist->playlist_id ?>, ' ') : '';" href="#">Excluir</a></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>

        <br>
        <hr>
        <br>

        <div class="create-btn">
            <a style="text-decoration: none;" href='create_playlist.php'><button>Criar Playlist</button></a>
        </div>

        <script>
            window.post = (data) => {

                return fetch(
                    'set_session.php',
                     {
                        method: 'POST',
                         headers: {'Content-Type': 'application/json'},
                          body: JSON.stringify(data)
                        }
                    )
                    .then(response => {
                        console.log(`${response}`);
                });

            }

            function gerirPlaylist(playlist_id, action){

                post({data : playlist_id});

                url = 'deletePlaylist.php';
                if(action === 'edit')
                    url = 'edit_playlist.php';
                if(action === 'musics')
                    url = 'manage_musics.php';
                
                window.location.href = url;
            }
        </script>
    </body>
</html>