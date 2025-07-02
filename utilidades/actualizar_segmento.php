<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "atlantic_city_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener todos los clientes
$sql_clientes = "SELECT id FROM clientes";
$result = $conn->query($sql_clientes);

while ($row = $result->fetch_assoc()) {
    $cliente_id = $row['id'];

    // Calcular gasto total del cliente en transacciones
    $sql_gasto = "SELECT SUM(gasto) AS total FROM transacciones WHERE cliente_id = $cliente_id";
    $res_gasto = $conn->query($sql_gasto);
    $gasto = $res_gasto->fetch_assoc()['total'];

    // Determinar el segmento
    if (is_null($gasto)) {
        $segmento = 'Nuevo';
    } elseif ($gasto >= 1000) {
        $segmento = 'VIP';
    } elseif ($gasto >= 100) {
        $segmento = 'Regular';
    } else {
        $segmento = 'Nuevo';
    }

    // Actualizar segmento del cliente
    $sql_update = "UPDATE clientes SET segmento = '$segmento' WHERE id = $cliente_id";
    $conn->query($sql_update);
}

$conn->close();
echo "Segmentos actualizados correctamente.";
?>
