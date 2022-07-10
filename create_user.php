<?php require_once('Repository/UsersRepository.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Criar Usuário</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/create-user.css"/>
    </head>

    <body>
        <div>
            <form name="formulario" action="registerUser.php" method="post" enctype="multipart/form-data">
                <div>
                    <svg width="100%" height="180" role="img" aria-label="Placeholder: Foto" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Foto</text>
                    </svg>
                </div>

                <input id='imgBase64' name="file" type="file" style='display: none;'>
                <label>Foto: <input type='button' value='Procurar' onclick="document.getElementById('imgBase64').click();"></label>
                <br>
                <label>Login: <input name="myName" type="text" placeholder="Digite o seu login"></label>
                <br>
                <label>Idade: <input name="age" type="int" placeholder="Digite sua idade"></label>
                <br>
                <label>Email: <input name="email" type="text" placeholder="Digite o seu email"></label>
                <br>
                <label>Senha: <input name="myPassword" type="password" placeholder="Digite sua senha"></label>
                <br>
                <a href="registerUser.php"><input class="create-btn" type="submit" value="Criar Conta"/></a>
            </form>
        </div>

        <?php include("rodape.php") ?>
        <script src="js/base64.js"></script>
    </body>

</html>