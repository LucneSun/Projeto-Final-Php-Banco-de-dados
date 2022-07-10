<?php
    require_once('Connection.php');

    function fnAddMusic($link, $type, $my_playlist_id){
        $con = getConnection();

        $sql = "insert into music (link, type, my_playlist_id) values (:pLink, :pType, :pMyPlaylistId)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pLink", $link);
        $stmt->bindParam(":pType", $type);
        $stmt->bindParam(":pMyPlaylistId", $my_playlist_id);

        return $stmt->execute();
    }

    function fnListMusicByType($link, $my_playlist_id, $type){
        $con = getConnection();

        $sql ="select * from music where link like :pLink and my_playlist_id = :pMyPlaylistId and type = :pType";

        $stmt = $con->prepare($sql);

        $stmt->bindValue(":pLink", "%{$link}%");
        $stmt->bindParam(":pMyPlaylistId", $my_playlist_id);
        $stmt->bindParam(":pType", $type);
        
        if($stmt->execute()){
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    }

    function fnListMusicByLink($link, $my_playlist_id){
        $con = getConnection();

        $sql ="select * from music where link like :pLink and my_playlist_id = :pMyPlaylistId";

        $stmt = $con->prepare($sql);

        $stmt->bindValue(":pLink", "%{$link}%");
        $stmt->bindParam(":pMyPlaylistId", $my_playlist_id);

        if($stmt->execute()){
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    }


    function fnLocateMusicByID($music_id){
        $con = getConnection();
        $sql = "select * from music where music_id = :pMusicId";

        $stmt = $con->prepare($sql); 
        $stmt->bindParam(":pMusicId", $music_id);

        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }

    function fnUpdateMusic($link, $type, $music_id){
        $con = getConnection();

        $sql = "update music set link = :pLink, type = :pType where music_id = :pMusicId";

        $stmt = $con->prepare($sql);

        $stmt->bindParam(":pMusicId", $music_id);
        $stmt->bindParam(":pLink", $link);
        $stmt->bindParam(":pType", $type);

        return $stmt->execute();
    }

    function fnDeleteMusic($music_id){
        $con = getConnection();

        $sql = "delete from music where music_id = :pMusicId";

        $stmt = $con->prepare($sql);      
        $stmt->bindParam(":pMusicId", $music_id);

        return $stmt->execute();
    }