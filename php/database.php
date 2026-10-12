<?php

$host = "192.168.100.79";
$username = "ecommerce_user";
$password = "Charity@2026";
$database = "ecommerce_db";
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
