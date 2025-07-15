<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

// Obtener promociones activas
$promociones = $conexion->query("SELECT * FROM promociones WHERE estado = 'Activo'");

// Obtener segmentos únicos desde clientes
$segmentos_query = $conexion->query("SELECT DISTINCT segmento FROM clientes");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Asignar Promoción - Atlantic City</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/btns.css">
  <link rel="stylesheet" href="../css/footer_sep.css">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
</head>
<body>

<header>
  <h1>🎯 Asignar Promoción a Clientes</h1>
  <a href="listar_promociones.php" class="btn">📋 Ver Promociones</a>
  <a href="../index.html" class="btn">🏠 Volver al Inicio</a>
</header>

<main>
  <form action="guardar_asignacion.php" method="POST" class="formulario">
    
    <label for="promocion_id">Seleccionar Promoción:</label>
    <select name="promocion_id" id="promocion_id" required>
      <option value="">-- Selecciona una promoción --</option>
      <?php while ($promo = $promociones->fetch_assoc()): ?>
        <option value="<?= $promo['id'] ?>"><?= $promo['titulo'] ?></option>
      <?php endwhile; ?>
    </select>

    <label for="segmento_objetivo">Seleccionar Segmento:</label>
    <select name="segmento_objetivo" id="segmento_objetivo" required>
      <option value="">-- Selecciona un segmento --</option>
      <?php while ($seg = $segmentos_query->fetch_assoc()): ?>
        <option value="<?= $seg['segmento'] ?>"><?= $seg['segmento'] ?></option>
      <?php endwhile; ?>
    </select>

    <button type="submit">✅ Asignar Promoción</button>
  </form>
</main>

<a href="https://wa.me/51921876815" class="wsp-btn" target="_blank" title="Contáctanos por WhatsApp">
  <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp">
</a>

</body>
</html>
