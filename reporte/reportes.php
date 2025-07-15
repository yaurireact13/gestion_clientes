<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}

$clientesVIP = $conexion->query("SELECT COUNT(*) AS total FROM clientes WHERE segmento = 'VIP'")->fetch_assoc()['total'];
$clientesRegulares = $conexion->query("SELECT COUNT(*) AS total FROM clientes WHERE segmento = 'Regular'")->fetch_assoc()['total'];

// Cambiado: ahora se muestra el gasto total de todos los clientes
$gastoClientes = $conexion->query("SELECT SUM(gasto) AS total FROM historial")->fetch_assoc()['total'] ?? 0;

// Clientes únicos con historial (para mostrar participación)
$clientesConConsumo = $conexion->query("SELECT COUNT(DISTINCT cliente_id) AS total FROM historial")->fetch_assoc()['total'];

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>📁 Reportes - Atlantic City</title>
  <link rel="stylesheet" href="../css/footer_sep.css" />
  <link rel="stylesheet" href="../css/reporte.css" />
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
</head>
<body>

  <h1>📁 Reportes del Casino</h1>
  <div>
    <a href="../index.html" class="btn">🏠 Volver al Inicio</a>
    <a href="../historial/registrar_historial.php" class="btn">📄 Registrar Consumo</a>
  </div> <br><br>

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
      <h3>Gasto Total de Clientes</h3>
      <p>S/ <?= number_format($gastoClientes, 2) ?></p>
    </div>
    <div class="card">
      <h3>Clientes con Actividad Registrada</h3>
      <p><?= $clientesConConsumo ?></p>
    </div>
  </div>

  <div class="exportar">
    <a href="exportar_reportes.php" class="boton-exportar">📄 Exportar Reportes</a>
  </div>

  <a href="https://wa.me/51921876815" class="wsp-btn" target="_blank" title="Contáctanos por WhatsApp">
    <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp" />
  </a>

</body>
</html>
