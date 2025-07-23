<?php
include("conexion.php");

$usuario = $_POST['usuario'];
$clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (usuario, clave) VALUES (?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $usuario, $clave);

if ($stmt->execute()) {
    header("Location: login.php");
} else {
    echo "Error al registrar";
}
?>
