<?php
    $server = 'localhost:3306';
    $username = 'root';
    $password = '';
    $database = 'cuadrangulares';

    // Create connection
    $conn = new mysqli($server, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>