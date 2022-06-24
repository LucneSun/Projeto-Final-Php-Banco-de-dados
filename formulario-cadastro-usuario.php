<?php
  include('config.php');
?>

<!doctype html>

<html lang="pt_BR">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap demo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>

  <body>
    <?php include('navbar.php')?>

    <div class="col-6 offset-3">
    <fieldset>
      <legend>Crie seu usuário</legend>
      <form action="registraUsuario.php" method="post" class="form">

        <div class="mb-3 form-group">
          <label for="loginId" class="form-label">Login</label>
          <input type="text" name="login" id="loginId" class="form-control" placeholder="Informe o login"/>
          <div id="helperLogin" class="form-text">Informe um login</div>
        </div>

        <div class="mb-3 form-group">
          <label for="nomeId" class="form-label">Nome</label>
          <input type="text" name="nome" id="nomeId" class="form-control" placeholder="Informe o nome"/>
          <div id="helperNome" class="form-text">Informe seu nome completo</div>
        </div>

        <div class="mb-3 form-group">
          <label for="emailId" class="form-label">E-mail</label>
          <input type="text" name="email" id="emailId" class="form-control" placeholder="Informe o e-mail"/>
          <div id="helperEmail" class="form-text">Informe seu e-mail</div>
        </div>

        <button type="submit" class="btn btn-dark">Enviar</button>
        <div id="notify" class="form-text text-capitalize fs-4"><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : ''?></div>
      </form>
    </fieldset>
  </div>
    <?php include("rodape.php");?>
  </body>

</html>