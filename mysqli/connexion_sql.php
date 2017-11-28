<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "formation";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
//var_dump($conn);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connexion mysql Ok";
echo " <br> ------- <br>";

