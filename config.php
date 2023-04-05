<?php
    $servername = "localhost";
    $username = "id20517519_indimart01";
    $password = "Hv@9925678950";
    $database = "id20517519_indimart";
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_errno) {
   echo "Failed to connect to MySQL: " . $conn->connect_error;
   exit();
}
?>