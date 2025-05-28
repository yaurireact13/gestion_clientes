<?php
// 1. Conexión a la base de datos (ajusta estos datos)
$servername = "localhost";
$username = "root";
$password = "";
$database = "atlantic_city_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// 2. Consultas para análisis
$totalClientes = $conn->query("SELECT COUNT(*) as total FROM clientes")->fetch_assoc()['total'];
$clientesVIP = $conn->query("SELECT COUNT(*) as total FROM clientes WHERE segmento = 'VIP'")->fetch_assoc()['total'];
$promocionesActivas = $conn->query("SELECT COUNT(*) as total FROM promociones_clientes WHERE estado = 'Activa'")->fetch_assoc()['total'];
$topCliente = $conn->query("SELECT nombre FROM clientes ORDER BY gasto_total DESC LIMIT 1")->fetch_assoc()['nombre'] ?? 'Sin datos';

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>📊 Análisis - Atlantic City</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; background: #fafafa; }
    h1 { color: #333; }
    .cards { display: flex; gap: 20px; flex-wrap: wrap; }
    .card {
      background: white; padding: 15px 20px; border-radius: 8px; box-shadow: 0 0 8px rgba(0,0,0,0.1);
      flex: 1 1 200px;
      text-align: center;
    }
    .card h3 { margin: 0 0 10px 0; color: #555; }
    .card p { font-size: 2rem; margin: 0; font-weight: bold; color: #007bff; }
    a.btn { display: inline-block; margin-bottom: 20px; padding: 10px 15px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; }
  </style>
</head>
<body>

  <h1>📊 Análisis de Clientes</h1>
  <a href="../index.html" class="btn">🏠 Volver al inicio</a>

  <div class="cards">
    <div class="card">
      <h3>Total de Clientes</h3>
      <p><?= $totalClientes ?></p>
    </div>
    <div class="card">
      <h3>Clientes VIP</h3>
      <p><?= $clientesVIP ?></p>
    </div>
    <div class="card">
      <h3>Promociones Activas</h3>
      <p><?= $promocionesActivas ?></p>
    </div>
    <div class="card">
      <h3>Top Gastador</h3>
      <p><?= htmlspecialchars($topCliente) ?></p>
    </div>
  </div>

</body>
</html>
