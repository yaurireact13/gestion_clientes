
<?php
// ---------------------------------------------
// Script para mostrar análisis y estadísticas generales
// Incluye conexión y consultas de análisis
// ---------------------------------------------

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "atlantic_city_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Consultas para obtener datos de análisis
$totalClientes = $conn->query("SELECT COUNT(*) as total FROM clientes")->fetch_assoc()['total'];
$clientesVIP = $conn->query("SELECT COUNT(*) as total FROM clientes WHERE segmento = 'VIP'")->fetch_assoc()['total'];
$promocionesActivas = $conn->query("SELECT COUNT(*) as total FROM promociones")->fetch_assoc()['total']; // Total de promociones registradas

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>📊 Análisis - Atlantic City</title>
  <link rel="stylesheet" href="../css/btns.css" />
  <link rel="stylesheet" href="../css/grafico.css" />
  <link rel="stylesheet" href="../css/footer_sep.css" />
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">

</head>
<body>
  <style>
    body { 
  font-family: Arial, sans-serif; 
  margin: 20px; 
  background: #121018; }

h1 { 
  color: #333;
  text-align: center;
  margin-bottom: 20px;
  font-size: 2.5rem;
  font-weight: bold;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
  color: #007bff;
  margin-top: 0;
  margin-bottom: 30px;
  padding: 10px;
  border-bottom: 2px solid #007bff;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);

}
.cards { 
  display: flex; 
  gap: 20px; 
  flex-wrap: wrap; 
}
.card {
  background: white; 
  padding: 15px 20px; 
  border-radius: 8px; 
  box-shadow: 0 0 8px rgba(0,0,0,0.1);
  flex: 1 1 200px;
  text-align: center;
}
.card h3 { 
  margin: 0 0 10px 0; 
  color: #555; }
.card p { 
  font-size: 2rem; 
  margin: 0; 
  font-weight: bold; 
  color: #007bff; }
a.btn { 
  display: inline-block; 
  margin-bottom: 20px; 
  padding: 10px 15px; 
  background: #007bff; 
  color: white; 
  text-decoration: none; 
  border-radius: 5px; 
}
  </style>

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
      <h3>Promociones</h3>
      <p><?= $promocionesActivas ?></p>
    </div>
    <div class="card">
      <h3>Clientes Activos</h3>
      <p><?= $totalClientes - $clientesVIP ?></p>
  </div>
  </div>

<!-- CDN de Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Gráfico de barras pequeñio-->
<canvas id="graficoClientes" width="100" height="50"></canvas>
<script>
  const ctx = document.getElementById('graficoClientes').getContext('2d');
  const graficoClientes = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Total Clientes', 'Clientes VIP', 'Promociones', 'Clientes Activos'],
      datasets: [{
        label: 'Datos de Clientes',
        data: [<?= $totalClientes ?>, <?= $clientesVIP ?>, <?= $promocionesActivas ?> , <?= $totalClientes - $clientesVIP ?>],
        backgroundColor: [
          'rgba(0, 123, 255, 0.6)',   
          'rgba(255, 206, 86, 0.6)',  
          'rgba(75, 192, 192, 0.6)',
          'rgba(153, 102, 255, 0.6)'   
        ],
        borderColor: [
          'rgba(0, 123, 255, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          ticks: { color: '#fff' }, 
          grid: { color: 'rgba(255, 255, 255, 0.1)' }
        },
        x: {
          ticks: { color: '#fff' },
          grid: { color: 'rgba(255, 255, 255, 0.1)' }
        }
      },
      plugins: {
        legend: {
          labels: { color: '#fff' }
        },
        title: {
          display: true,
          color: '#fff',
          font: {
            size: 18
          }
        }
      }
    }
  });
</script>
  </div>
<div>
  <a href="https://wa.me/51921876815" class="wsp-btn" target="_blank" title="Contáctanos por WhatsApp">
    <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp" />
  </a>

</div>
</body>
</html>
