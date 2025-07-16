<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Configurar cabeceras para descargar CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="reporte_gastos_clientes.csv"');

// Abrir archivo CSV en salida
$output = fopen('php://output', 'w');

// Escribir título
fputcsv($output, ['📄 GASTO TOTAL DE CLIENTES (Historial de Actividades)']);
fputcsv($output, []);

// Escribir encabezados
fputcsv($output, ['ID', 'Cliente', 'Fecha', 'Actividad', 'Gasto (S/)']);

// Consultar historial con JOIN para obtener el nombre del cliente
$query = "
  SELECT h.id, CONCAT(c.nombre, ' ', c.apellido) AS cliente, h.fecha, h.actividad, h.gasto
  FROM historial h
  JOIN clientes c ON h.cliente_id = c.id
  ORDER BY h.fecha DESC
";

$resultado = $conexion->query($query);
while ($fila = $resultado->fetch_assoc()) {
    fputcsv($output, $fila);
}

// Cierre
fclose($output);
$conexion->close();
exit;
?>
