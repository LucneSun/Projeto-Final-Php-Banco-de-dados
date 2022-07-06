<?php if(!isset($_COOKIE['notify'])){
    header('location: index.php');
    exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>ErrorPage</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/login.css"/>
    </head>

    <body>
        <div>
            <h1 style='color: white'><?= $_COOKIE['notify']; ?></h1>
        </div>
    </body>

</html>

