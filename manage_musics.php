<?php 
    include('config.php');
    require_once("repository/MusicRepository.php");
    require_once('repository/PlaylistRepository.php');

    $notify = filter_input(INPUT_GET, 'notify', FILTER_SANITIZE_SPECIAL_CHARS);
    if(!$playlist = fnLocatePlaylistByID($_SESSION['id']))
    header("location: manage_playlists.php");
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
                    <a href='config_page.php'><img src="<?= $_SESSION['login']->photo_link?>" alt="profile picture"/></a>
                    <a style='text-decoration: none; color: white;' href='search.php'><li>Pesquisar</li></a>
                    <a style='text-decoration: none; color: white;' href='manage_playlists.php'><li>Gerenciar Playlists</li></a>
                    <a href="logout.php" style='text-decoration: none; color: white;' ><li>Sair</li></a>
                </ul>
            </nav>
        </header>

        <?php $msg = "<h1 id='message' class='message'> Músicas</h1>";  $musics = 0; echo $msg;?>
        <div class="list_of_playlist">
            <table>
                <tbody>
                    <?php foreach(fnListMusicByLink('', $playlist->playlist_id) as $music) :?>
                    <tr>
                        <td style="padding-right: 10px;"><?= $music->music_id?></td>
                        <td><?= $music->link?></td>
                        <td><?= $music->type?></td>
                        <td class="btn"><a href="#" onclick="manageMusic(<?= $music->music_id ?>, 'edit')">Editar</a></td>
                        <td class="btn"><a onclick="return confirm('Deseja realmente excluir?') ? manageMusic(<?= $music->music_id ?>, ' ') : '';" href="#">Excluir</a></td>
                        <?php $musics += 1;?>
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

        <script>
            var message = document.getElementById('message');
            if(!<?= $musics?> > 0)
            message.textContent = 'Essa playlist ainda não tem músicas';


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

            function manageMusic(music_id, action){

                post({data : music_id});

                url = 'deleteMusic.php';
                if(action === 'edit')
                    url = 'edit_music.php';
                
                window.location.href = url;
            }
        </script>
    </body>
</html>