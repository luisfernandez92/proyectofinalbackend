<?php
    session_start();
    require_once '../config/config.php';

    $idAlbum = $_GET['idAlbum'];

    //Obtener Albumnes
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM album WHERE intIdAlbum = ?";
    $statement = $conn->prepare($sql);
    $statement->bindParam(1, $idAlbum );
    $statement->execute(); 

    // echo "<script>window.location.replace('http://localhost/album/public_html/pages/add_album.php');</script>";
    header("location:".$ruta."pages/add_album.php");