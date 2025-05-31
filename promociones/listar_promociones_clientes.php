<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

// Obtener los segmentos disponibles
$segmentos = ["VIP", "Frecuentes", "Ocasionales"]; // Puedes expandir esto según los segmentos que tengas

// Obtener las fechas de inicio y fin (si hay filtro por fecha)
$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : '';
$fecha_fin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : '';
$segmento_filtro = isset($_POST['segmento_objetivo']) ? $_POST['segmento_objetivo'] : '';

// Construir la consulta según los filtros seleccionados
$query = "SELECT c.id AS cliente_id, c.nombre, c.apellido, p.titulo AS promocion, p.fecha_inicio, p.fecha_fin
          FROM clientes c
          JOIN promociones_clientes pc ON c.id = pc.cliente_id
          JOIN promociones p ON pc.promocion_id = p.id";

if ($segmento_filtro != '') {
    $query .= " WHERE c.segmento_objetivo = '$segmento_filtro'";
}

if ($fecha_inicio != '' && $fecha_fin != '') {
    $query .= ($segmento_filtro != '' ? " AND" : " WHERE") . " p.fecha_inicio >= '$fecha_inicio' AND p.fecha_fin <= '$fecha_fin'";
}

$resultado = $conexion->query($query);

// Formulario de filtros
echo "<h1>📋 Filtro de Promociones Asignadas</h1>";
echo "<form method='POST' action='listar_promociones_clientes.php'>";
echo "<label>Segmento:</label>";
echo "<select name='segmento_objetivo'>";
echo "<option value=''>Seleccionar Segmento</option>";
foreach ($segmentos as $segmento_objetivo) {
    $selected = ($segmento_filtro == $segmento_objetivo) ? "selected" : "";
    echo "<option value='$segmento_objetivo' $selected>$segmento_objetivo</option>";
}
echo "</select><br>";

echo "<label>Fecha de Inicio:</label>";
echo "<input type='date' name='fecha_inicio' value='$fecha_inicio'><br>";

echo "<label>Fecha de Fin:</label>";
echo "<input type='date' name='fecha_fin' value='$fecha_fin'><br>";

echo "<button type='submit'>Filtrar</button>";
echo "</form>";

echo "<h2>Promociones Asignadas</h2>";

echo "<table border='1' cellpadding='10'>
<tr><th>Cliente</th><th>Promoción</th><th>Fecha de Inicio</th><th>Fecha de Fin</th></tr>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>
    <td>{$fila['nombre']} {$fila['apellido']}</td>
    <td>{$fila['promocion']}</td>
    <td>{$fila['fecha_inicio']}</td>
    <td>{$fila['fecha_fin']}</td>
    </tr>";
}

echo "</table>";
?>
