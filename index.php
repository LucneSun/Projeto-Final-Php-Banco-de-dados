<?php
  require_once('repository/UserRepository.php');
  $notificacao = filter_input(INPUT_GET, 'notify', FILTER_SANITIZE_SPECIAL_CHARS);
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
  <div class="col-6 offset-3">
    <fieldset>
      <legend>Login</legend>
      <form action="loginSistema.php" method="post" class="form">
        <div class="mb-3 form-group">
          <label for="loginId" class="form-label">Login</label>
          <input type="text" name="login" id="nomeId" class="form-control" placeholder="Informe o login"/>
          <div id="helperLogin" class="form-text">Informe o login</div>
        </div>

        <div class="mb-3 form-group">
          <label for="emailId" class="form-label">Email</label>
          <input type="text" name="email" id="emailId" class="form-control" placeholder="Informe o email"/>
          <div id="helperEmail" class="form-text">Informe seu email</div>
        </div>

        <button type="submit" class="btn btn-dark">Entrar</button>
        <div id="notify" class="form-text text-capitalize fs-4"><?= $notificacao ?></div>
      </form>
    </fieldset>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  </body>

</html>