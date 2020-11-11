<?php

//Establece conexion
$server = "localhost";
$port = 3306;
$user = "root";
$password = "1234";
$db = "world";

$conn = new mysqli($server, $user, $password, $db, $port);
if ($conn->connect_error) {

    die("La conexión falló: " . $conn->connect_error);
}
