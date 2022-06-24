<?php
    require_once('Connection.php');

    function fnAddUsuario($login, $nome, $email){
        $con = getConnection();
        $sql = "Insert into usuario(login, nome, email) values (:pLogin, :pNome, :pEmail)";

        $stmt = $con->prepare($sql);
        $stmt -> bindParam(":pLogin", $login);
        $stmt -> bindParam(":pNome", $nome);
        $stmt -> bindParam(":pEmail", $email);

        return $stmt->execute();
    }

    function fnListUsuarios(){
        $con = getConnection();

        $sql = "select * from usuario";

        $result = $con->query($sql);

        $lstUsuarios = array();
        while($usuario = $result -> fetch(PDO::FETCH_OBJ)){
            array_push($lstUsuarios, $usuario);
        }

        return $lstUsuarios;
    }

    function fnLocalizaUsuarioPorID($id){
        $con = getConnection();
        $sql = "select * from usuario where id = :pID";
        $stmt = $con->prepare($sql);
        $stmt -> bindParam(":pID", $id);

        if($stmt->execute()){ 
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        return null;
    }

    function fnLocalizaUsuarioPorNome($nome){
        $con = getConnection();

        $sql = "select * from usuario where nome like :pNome limit 20";

        $stmt = $con->prepare($sql);

        $stmt-> bindValue(":pNome", "%{$nome}%");

        if($stmt->execute()){
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    }

    function fnUpdateUsuario($id, $login, $nome, $email){
        $con = getConnection();
        $sql = "update usuario set login = :pLogin, nome = :pNome, email = :pEmail where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt -> bindParam(":pID", $id);
        $stmt -> bindParam(":pLogin", $login);
        $stmt -> bindParam(":pNome", $nome);
        $stmt -> bindParam(":pEmail", $email);

        return $stmt->execute();
    }

    function fnDeleteUsuario($id){
        $con = getConnection();
        $sql = "delete from usuario where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt -> bindParam(":pID", $id);

        return $stmt->execute();
    }

    function fnLogin($login, $email){
        $con = getConnection();
        $sql = "select id, email, creat_at as createdAt from usuario where login = :pLogin and email = :pEmail";

        $stmt = $con->prepare($sql);
        $stmt -> bindParam(":pLogin", $login);
        $stmt -> bindParam(":pEmail", $email);

       if($stmt->execute()){
        return $stmt->fetch(PDO::FETCH_OBJ);
       }
       return null;
    }
?>