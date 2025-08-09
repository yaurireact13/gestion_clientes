<?php
// ---------------------------------------------
// Script para eliminar un cliente de la base de datos
// Recibe el ID por GET y elimina el registro correspondiente
// ---------------------------------------------

$conexion = new mysqli("localhost", "root", "", "atlantic_city_db"); // Conexión a la base de datos

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verifica que se haya recibido el ID del cliente por GET
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convierte el ID a entero por seguridad

    // Consulta SQL para eliminar el cliente
    $sql = "DELETE FROM clientes WHERE id = $id";

    // Ejecuta la consulta y muestra mensaje según el resultado
    if ($conexion->query($sql) === TRUE) {
        echo "<script>alert('Cliente eliminado correctamente'); window.location.href='listar_clientes.php';</script>";
    } else {
        echo "Error al eliminar el cliente: " . $conexion->error;
    }
} else {
    echo "ID no proporcionado.";
}

$conexion->close(); // Cierra la conexión
?>
