<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM clientes WHERE id = $id";

    if ($conexion->query($sql) === TRUE) {
        echo "<script>alert('Cliente eliminado correctamente'); window.location.href='listar_clientes.php';</script>";
    } else {
        echo "Error al eliminar el cliente: " . $conexion->error;
    }
} else {
    echo "ID no proporcionado.";
}

$conexion->close();
?>
