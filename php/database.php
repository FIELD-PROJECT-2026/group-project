<?php

$host = "192.168.1.30";
$username = "root";
$password = "Vampire@45";
$database = "fashionstoredb";
$port = 3306;

$conn = mysqli_connect(
    $host,
    $username,
    $password,
    $database,
    $port
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?>
