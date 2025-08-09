<?php
// ---------------------------------------------
// Script para procesar el registro de un nuevo usuario
// Recibe usuario y clave por POST, encripta la clave y guarda en la base de datos
// ---------------------------------------------

include("conexion.php"); // Incluye la conexión a la base de datos

$usuario = $_POST['usuario']; // Usuario ingresado en el formulario
$clave = password_hash($_POST['clave'], PASSWORD_DEFAULT); // Encripta la clave

// Prepara la consulta SQL para insertar el nuevo usuario
$sql = "INSERT INTO usuarios (usuario, clave) VALUES (?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $usuario, $clave);

// Ejecuta la consulta y redirige o muestra error
if ($stmt->execute()) {
    header("Location: login.php"); // Redirige al login si fue exitoso
} else {
    echo "Error al registrar";
}
?>
