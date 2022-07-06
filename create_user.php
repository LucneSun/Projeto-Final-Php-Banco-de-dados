
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Criar Usuário</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/create-user.css">
    </head>

    <body>
        <div class="create-user">
            <form>
                <label>Nome: <input type="text" required/></label>
                <br>
                <label>Login: <input type="text" required/></label>
                <br>
                <label>Email: <input type="email" required/></label>
                <br>
                <label>Senha: <input type="password" minlength="8" required/></label>
                <br>
                <input type="submit" value="Criar Conta" style="margin:20px 65px;">
                <br>
                <a href="login.html"><input type="button" value="Voltar" style="margin: 10px 105px;"></a>
            </form>
        </div>

    </div>
    <div style="display: flex;
        color: white;
        font-family: consolas;
        font-size: 4vh;
        width: 500px;
        margin: auto;" id="notify"><h1><?= $notify ?></h1>
    </div>

    </body>

</html>