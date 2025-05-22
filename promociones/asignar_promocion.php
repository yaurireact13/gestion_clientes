<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

// Obtener las promociones disponibles
$promociones = $conexion->query("SELECT * FROM promociones");

echo "<h1>🎁 Asignar Promoción a Clientes</h1>";
echo "<form action='guardar_asignacion.php' method='POST'>";
echo "<label for='promocion'>Seleccionar Promoción:</label>";
echo "<select name='promocion_id' required>";
while ($promo = $promociones->fetch_assoc()) {
    echo "<option value='" . $promo['id'] . "'>" . $promo['titulo'] . "</option>";
}
echo "</select><br>";

// Obtener los segmentos de clientes
$segmentos = ["VIP", "Frecuentes", "Ocasionales"];
echo "<label for='segmento_objetivo'>Seleccionar Segmento:</label>";
echo "<select name='segmento_objetivo' required>";
foreach ($segmentos as $segmento_objetivo) {
    echo "<option value='" . $segmento_objetivo . "'>" . $segmento_objetivo . "</option>";
}
echo "</select><br>";

echo "<button type='submit'>Asignar Promoción</button>";
echo "</form>";
?>
