<?php
session_start();
require_once '../config/config.php';

if (isset($_SESSION['login'])) {
    unset($_SESSION['login']);

    // echo "<script>window.location.replace('http://localhost/album/public_html/');</script>";
    header("location:".$ruta."");
}