<?php
    session_start();
    require_once '../config/config.php';

    $idFoto = $_GET['idFoto'];
    $idAlbum = $_GET['idAlbum'];

    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM foto WHERE intIdFoto = ?";
    $statement = $conn->prepare($sql);
    $statement->bindParam(1, $idFoto );
    $statement->execute(); 

    header("location:".$ruta."pages/add_photo.php?idAlbum=".$idAlbum."");