<?php
 function Opencon()

 {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "indimart";
    
    $conn = new mysqli($servername, $username, $password, $database);
    
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
    
 }

 function Closecon($conn)
 {
    $conn -> close();
 }

?>