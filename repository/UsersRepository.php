<?php
    require_once('Connection.php');

    function fnAddUser($my_name, $age, $email, $my_password, $photo_link){
        $con = getConnection();

        $sql = "insert into users (my_name, age, photo_link, email, my_password) values (:pMyName, :pAge, :pPhotoLink, :pEmail, :pMyPassword)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pMyName", $my_name);
        $stmt->bindParam(":pAge", $age);
        $stmt->bindParam(":pPhotoLink", $photo_link);
        $stmt->bindParam(":pEmail", $email);
        $stmt->bindValue(":pMyPassword", md5($my_password));

        return $stmt->execute();
    }

    function fnUpdateUser($id, $my_name, $age, $my_password, $photo_link){
        $con = getConnection();

        $sql = "update users set my_name = :pMyName, age = :pAge, my_password = :pMyPassword, photo_link = :pPhotoLink where id = :pId;";

        $stmt = $con->prepare($sql);

        $stmt->bindParam(":pId", $id);
        $stmt->bindParam(":pMyName", $my_name);
        $stmt->bindParam(":pAge", $age);
        $stmt->bindValue(":pMyPassword", md5($my_password));
        $stmt->bindParam(":pPhotoLink", $photo_link);

        return $stmt->execute();
    }

    function fnDeleteUser($id){
        $con = getConnection();

        $sql = "delete from users where id = :pId";

        $stmt = $con->prepare($sql);      
        $stmt->bindParam(":pId", $id);

        return $stmt->execute();
    }

    function fnLogin($my_name, $my_password){
        $con = getConnection();

        $sql = "select id, my_name, age, photo_link, email, created_at from users where my_name = :pMyName and my_password = :pMyPassword";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pMyName", $my_name);
        $stmt->bindValue(":pMyPassword", md5($my_password));

        if($stmt->execute())
        return $stmt->fetch(PDO::FETCH_OBJ);

        return null;
    }

    function fnUpdatePassword($email, $new_password){
        $con = getConnection();

        $sql = "update users set my_password = :pMyPassword where email = :pEmail";

        $stmt = $con->prepare($sql);

        $stmt->bindParam(":pEmail", $email);
        $stmt->bindValue(":pMyPassword", md5($new_password));

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    function fnLocateUserByID($id){
        $con = getConnection();
        $sql = "select * from users where id = :pID";

        $stmt = $con->prepare($sql); 
        $stmt->bindParam(":pID", $id);

        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }