<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta a la base de datos para obtener los reportes
$consulta = "SELECT * FROM clientes";
$resultado = $conexion->query($consulta);

// Cabecera para la descarga de CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="reporte_clientes.csv"');

// Abrir el archivo CSV en modo de escritura
$output = fopen('php://output', 'w');

// Escribir los nombres de las columnas en el CSV
fputcsv($output, ['ID', 'Nombre', 'DNI', 'Correo', 'Teléfono', 'Fecha Registro']);

// Escribir los datos de los clientes
while ($fila = $resultado->fetch_assoc()) {
  fputcsv($output, $fila);
}

// Cerrar conexión y archivo
fclose($output);
$conexion->close();
exit;
?>
