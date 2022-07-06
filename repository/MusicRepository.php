<?php
    require_once('Connection.php');

    function fnAddPlaylist($playlist_name, $image_link, $playlist_description, $created_by){
        $con = getConnection();

        $sql = "insert into playlist (playlist_name, image_link, playlist_description, created_by) values (:pPlaylistName, :pImageLink, :pPlaylistDescription, :pCreatedBy)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pPlaylistName", $playlist_name);
        $stmt->bindParam(":pImageLink", $image_link);
        $stmt->bindParam(":pPlaylistDescription", $playlist_description);
        $stmt->bindParam(":pCreatedBy", $created_by);

        return $stmt->execute();
    }

    function fnListPlaylistByName($name){
        $con = getConnection();

        $sql = "select * from playlist where playlist_name like :pPlaylistName";

        $stmt = $con->prepare($sql);
        $stmt->bindValue(":pPlaylistName", "%{$name}%");
        
        if($stmt->execute()){
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            return $stmt->fetchAll();
        }
    }

    
    function fnListPlaylist(){
        $con = getConnection();

        $sql = "select * from playlist";
        
        $result = $con->query($sql);
        $lstPlaylists = array();
        while($playlist = $result->fetch(PDO::FETCH_OBJ)){
            array_push($lstPlaylists, $playlist);
        }

        return $lstPlaylists;
    }

    function fnLocatePlaylistByID($playlist_id){
        $con = getConnection();
        $sql = "select * from playlist where playlist_id = :pID";

        $stmt = $con->prepare($sql); 
        $stmt->bindParam(":pID", $playlist_id);

        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }

    function fnUpdatePlaylist($playlist_id, $playlist_name, $image_link, $playlist_description){
        $con = getConnection();

        $sql = "update playlist set playlist_name = :pPlaylistName, image_link = :pImageLink, playlist_description = :pPlaylistDescription where playlist_id = :pPlaylistID";

        $stmt = $con->prepare($sql);

        $stmt->bindParam(":pPlaylistID", $playlist_id);
        $stmt->bindParam(":pPlaylistName", $playlist_name);
        $stmt->bindParam(":pImageLink", $image_link);
        $stmt->bindParam(":pPlaylistDescription", $playlist_description);

        return $stmt->execute();
    }

    function fnDeletePlaylist($playlist_id){
        $con = getConnection();

        $sql = "delete from playlist where playlist_id = :pID";

        $stmt = $con->prepare($sql);      
        $stmt->bindParam(":pID", $playlist_id);

        return $stmt->execute();
    }