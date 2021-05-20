<?php

$host = "localhost";
$user = "root";
$pwd = "";
$dbName = "bortar";
$con;

try {
    $con = new PDO("mysql:host=$host;dbname=$dbName", $user, $pwd);
    $con->exec("set names 'utf8'");
} catch (PDOException $e) {
    die("<h1>Adatbázis kapcsolódási hiba!</h1>");
}