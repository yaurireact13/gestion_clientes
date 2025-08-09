<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);

<?php
// ---------------------------------------------
// Script para mostrar reportes generales del casino
// Incluye conexión y consultas de reportes
// ---------------------------------------------

$conexion = new mysqli("localhost", "root", "", "atlantic_city_db"); // Conexión a la base de datos
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta para obtener el total de clientes VIP
$clientesVIP = $conexion->query("SELECT COUNT(*) AS total FROM clientes WHERE segmento = 'VIP'")->fetch_assoc()['total'];
// Consulta para obtener el total de clientes regulares
$clientesRegulares = $conexion->query("SELECT COUNT(*) AS total FROM clientes WHERE segmento = 'Regular'")->fetch_assoc()['total'];

// Consulta para obtener el gasto total de todos los clientes
$gastoClientes = $conexion->query("SELECT SUM(gasto) AS total FROM historial")->fetch_assoc()['total'] ?? 0;

// Consulta para obtener la cantidad de clientes únicos con historial
$clientesConConsumo = $conexion->query("SELECT COUNT(DISTINCT cliente_id) AS total FROM historial")->fetch_assoc()['total'];

$conexion->close(); // Cierra la conexión
?>
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
      <h3 id ="edit_"><a href="../historial/listar_historial.php" style="text-decoration:none; color: #66b2ff; ">Gasto Total de Clientes</a></h3>
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
