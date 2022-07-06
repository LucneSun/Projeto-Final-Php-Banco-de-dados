<?php
    define("HOST", "localhost");
    define("USER", "root");
    define("PASS", "");
    define("DATABASE", "playlist_share");

    function getConnection(){
        $dsn = "mysql:host=" . HOST . ";dbname=" . DATABASE;

        $con = new PDO($dsn, USER, PASS) or die("Erro tentando conectar ao banco");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->query("set @@global.time_zone = '+3:00'");   

        return $con;
    }
?>