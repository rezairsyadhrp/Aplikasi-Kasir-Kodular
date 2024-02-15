<?php
$servername = "localhost";
$username = "id21868802_kasir_app";
$password = "Rezagt-123";
$database = "id21868802_kasir_app";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?>