<?php

$servername = "192.168.1.19"; 
$username   = "root";
$password   = "Vampire@45";
$database   = "fashionStoreDB";
$port       = 3306;

$conn = new mysqli(
            $servername, 
            $username,
            $password, 
            $database,
            $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>


//$host = "192.168.1.30";
//$username = "root";
//$password = "Vampire@45";
//$database = "fashionstoredb";
//$port = 3306;

//$conn = mysqli_connect(
   // $host,
   // $username,
   // $password,
   // $database,
   // $port
//);

//if (!$conn) {
   // die("Connection failed: " . mysqli_connect_error());
//}



?>
