<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "atlantic_city_db";

$conexion = new mysqli($host, $user, $pass, $db); 

if ($conexion->connect_error) {
    die("Error al conectar con la base de datos: " . $conexion->connect_error);
}
?>
