<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

// Validar datos recibidos
if (!isset($_POST['promocion_id'], $_POST['segmento_objetivo'])) {
    die("Datos incompletos.");
}

$promocion_id = intval($_POST['promocion_id']);
$segmento_objetivo = $conexion->real_escape_string($_POST['segmento_objetivo']);

// Obtener los datos de la promoción
$promo_result = $conexion->query("SELECT titulo, descripcion FROM promociones WHERE id = $promocion_id");
$promo = $promo_result->fetch_assoc();

if (!$promo) {
    die("Promoción no encontrada.");
}

// Obtener los clientes del segmento
$clientes = $conexion->query("SELECT id FROM clientes WHERE segmento = '$segmento_objetivo'");

// Guardar asignación en promociones_clientes
$asignados = 0;
while ($cliente = $clientes->fetch_assoc()) {
    $cliente_id = $cliente['id'];

    // Evitar duplicados (opcional)
    $verificar = $conexion->query("SELECT * FROM promociones_clientes WHERE cliente_id = '$cliente_id' AND promocion_id = '$promocion_id'");
    if ($verificar->num_rows == 0) {
        $conexion->query("INSERT INTO promociones_clientes (cliente_id, promocion_id) VALUES ('$cliente_id', '$promocion_id')");
        $asignados++;
    }
}

// Mensaje final
echo "<script>
    alert('Promoción asignada al segmento \"$segmento_objetivo\". Total asignados: $asignados.');
    window.location.href='listar_promociones.php';
</script>";
?>
