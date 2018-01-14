<?php

function connectDB() {
    $servername = 'localhost';
    $dbname = 'nd11';
    $username = 'Auto';
    $password = 'LabaiSlaptas123';


    // Create connection 
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection 
    if ($conn->connect_error) {
        die('Nepavyko prisijungti: ' .$conn->connect_error);
    }
    return $conn;
}


?>