<head>
  <meta charset="UTF-8">
  <title>📑 Reportes</title>
  <link rel="stylesheet" href="../css/reportes.css">
  <link rel="stylesheet" href="../css/footer_sep.css">
</head>
<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}

// Datos para los reportes
$clientesVIP = $conexion->query("SELECT COUNT(*) AS total FROM clientes WHERE segmento_objetivo = 'VIP'")->fetch_assoc()['total'];
$clientesRegulares = $conexion->query("SELECT COUNT(*) AS total FROM clientes WHERE segmento = 'Regular'")->fetch_assoc()['total'];
$gastoPromociones = $conexion->query("SELECT SUM(gasto) AS total FROM transacciones WHERE tipo = 'promocion'")->fetch_assoc()['total'];
$clientesConPromociones = $conexion->query("SELECT COUNT(DISTINCT cliente_id) AS total FROM transacciones WHERE tipo = 'promocion'")->fetch_assoc()['total'];
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>📑 Reportes - Atlantic City</title>
  <link rel="stylesheet" href="reportes.css">
</head>
<body>

  <h1>📑 Reportes del Casino</h1>
  <a href="../index.html" class="btn">🏠 Volver al Inicio</a>

  <div class="reportes-cards">
    <div class="card">
      <h3>Clientes VIP</h3>
      <p><?= $clientesVIP ?></p>
    </div>
    <div class="card">
      <h3>Clientes Regulares</h3>
      <p><?= $clientesRegulares ?></p>
    </div>
    <div class="card">
      <h3>Total Gastado en Promociones</h3>
      <p>$<?= number_format($gastoPromociones, 2) ?></p>
    </div>
    <div class="card">
      <h3>Clientes con Promociones Activas</h3>
      <p><?= $clientesConPromociones ?></p>
    </div>
  </div>

<!--Descargar Datos en Csv-->

  <div class="exportar">
    <a href="exportar_reportes.php" class="boton-exportar">📤 Exportar Reportes</a>
  </div>

  <!------------------------Boton de whatsapp-------------------->
<a href="https://wa.me/51921876815" class="wsp-btn" target="_blank" title="Contáctanos por WhatsApp">
      <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp">
    </a>

<!------------------------Boton de whatsapp-------------------->


</body>
</html>
