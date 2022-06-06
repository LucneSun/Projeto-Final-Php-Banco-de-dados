<?php
  require_once('repository/UserRepository.php');
?>

<!doctype html>

<html lang="pt_BR">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Listagem de Usuarios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>

  <body>
    <div class="col -6 offset-3">
        <table class="table table-stripped">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Login</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Senha</th>
                  <th>Data Cadastro</th>
                  <th colspan="2">Gerenciar</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach(fnListUsuarios() as $usuario): ?>
                    <tr>
                        <td><?= $usuario -> id ?></td>
                        <td><?= $usuario -> login ?></td>
                        <td><?= $usuario -> nome ?></td>
                        <td><?= $usuario -> email ?></td>
                        <td><?= $usuario -> senha ?></td>
                        <td><?= $usuario -> creat_at ?></td>
                        <td><a href="formulario-edita-usuario.php?id=<?= $usuario->id?>">Editar</a></td>
                        <td><a onclick="return confirm('Deseja realmente excluir?');" href="excluirUsuario.php?id=<?= $usuario->id?>">Excluir</a></td>
                        <td><?= $usuario -> id ?></td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
            <?php if(isset($notificacao)) :?>
            <tfoot>
              <tr>
                <td colspan="7"><?= $notificacao?></td>
                </tr>
                </tfoot>
              <?php endif;?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  </body>

</html>