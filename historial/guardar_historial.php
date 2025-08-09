<?php
// ---------------------------------------------
// Script para guardar una nueva actividad en el historial
// Valida datos, inserta en la base de datos y muestra respuesta
// ---------------------------------------------

$conexion = new mysqli("localhost", "root", "", "atlantic_city_db"); // Conexión a la base de datos
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cliente_id = $_POST['cliente_id'] ?? null;
    $fecha = $_POST['fecha'] ?? null;
    $actividad = strtolower(trim($_POST['actividad'] ?? ''));
    $gasto = $_POST['gasto'] ?? null;

    // Valida que todos los campos sean correctos
    if ($cliente_id && $fecha && $actividad && is_numeric($gasto)) {
        $stmt = $conexion->prepare("INSERT INTO historial (cliente_id, fecha, actividad, gasto) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("issd", $cliente_id, $fecha, $actividad, $gasto);

        if ($stmt->execute()) {
            echo "<script>alert('✅ Actividad registrada correctamente.'); window.location.href='registrar_historial.php';</script>";
        } else {
            echo "<p style='color:red;'>❌ Error al registrar: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p style='color:red;'>❌ Todos los campos son obligatorios y el gasto debe ser un número.</p>";
    }
}

$conexion->close(); // Cierra la conexión
?>
