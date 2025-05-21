<?php
// db_config.php

$servername = "localhost";
$username = "root";
$password = "";
$database = "f1_jacket_store";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
