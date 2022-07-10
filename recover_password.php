<?php 
$notify = filter_input(INPUT_GET, 'notify', FILTER_SANITIZE_SPECIAL_CHARS);
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Recuperar Senha</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/login.css"/>
    </head>

    <body>
    <body>
        <div>
            <form name="formulario" action="recoverPassword.php" method="post">
                <label>Email: <input name="email" type="text" placeholder="Digite o seu email"></label>
                <br>
                <input class="create-btn" type="submit" value="Recuperar Senha"/>
            </form>
        </div>
    </body>

    <div style="display: flex;
    color: white;
    font-family: consolas;
    font-size: 4vh;
    width: 500px;
    margin: auto;" id="notify"><h1><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></h1></div>
</html>