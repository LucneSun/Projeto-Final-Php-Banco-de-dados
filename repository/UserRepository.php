<?php
    require_once('Connection.php');

    function fnAddUsuario($login, $nome, $email, $senha){
        $con = getConnection();
        $sql = "Insert into usuario(login, nome, email, senha) values (:pLogin, :pNome, :pEmail, :pSenha)";

        $stmt = $con->prepare($sql);
        $stmt -> bindParam(":pLogin", $login);
        $stmt -> bindParam(":pNome", $nome);
        $stmt -> bindParam(":pEmail", $email);
        $stmt -> bindParam(":pSenha", $senha);

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

    function fnUpdateUsuario($id, $login, $nome, $email, $senha){
        $con = getConnection();
        $sql = "update usuario set login = :pLogin, nome = :pNome, email = :pEmail, senha = :pSenha where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt -> bindParam(":pID", $id);
        $stmt -> bindParam(":pLogin", $login);
        $stmt -> bindParam(":pNome", $nome);
        $stmt -> bindParam(":pEmail", $email);
        $stmt -> bindParam(":pSenha", $senha);

        return $stmt->execute();
    }

    function fnDeleteUsuario($id){
        $con = getConnection();
        $sql = "delete from usuario where id = :pID";

        $stmt = $con->prepare($sql);
        $stmt -> bindParam(":pID", $id);

        return $stmt->execute();
    }
?>