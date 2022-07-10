<?php require_once('Repository/UsersRepository.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Login</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/login.css"/>
    </head>

    <body>
        <div>
            <form name="formulario" action="login.php" method="post">
                <label>Usuário: <input name="myName" type="text" placeholder="Digite o seu login"></label>
                <br>
                <label>Senha: <input name="myPassword" type="password" placeholder="Digite sua senha"></label>
                <br>
                <input class="login-btn" type="submit" value="Entrar"/>
                <br>
                <a style="margin-left: 25px" href="recover_password.php"><input type="button" value="Recuperar Senha"/></a>
                <br>
                <label class="create-label">Não tem conta? <a href="create_user.php"><input class="create-btn" type="button" value="Criar Conta"/></a></label>
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