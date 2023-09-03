<?php
require_once '../config/config.php';

$ip = $_GET['ip'];
$currencyCode = $_GET['currencyCode'];
$countryName = $_GET['countryName'];
$city = $_GET['city'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];

$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Connected successfully"; 
$sql = "INSERT INTO registro (vchIP, vchCurrencyCode, vchCountryName, vchCity, vchLat, vchLng) VALUES (?, ?, ?, ?, ?, ?)";
$statement = $conn->prepare($sql);
$statement->bindParam(1, $ip);
$statement->bindParam(2, $currencyCode);
$statement->bindParam(3, $countryName);
$statement->bindParam(4, $city);
$statement->bindParam(5, $lat);
$statement->bindParam(6, $lng);

$statement->execute();     