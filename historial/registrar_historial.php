<?php
// ---------------------------------------------
// Script para registrar una nueva actividad en el historial
// Valida datos, inserta en la base de datos y muestra formulario
// ---------------------------------------------

$conexion = new mysqli("localhost", "root", "", "atlantic_city_db"); // Conexión a la base de datos
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cliente_id = $_POST['cliente_id'];
    $fecha = $_POST['fecha'];
    $actividad = $_POST['actividad'];
    $gasto = floatval($_POST['gasto']);

    // Valida que todos los campos sean correctos
    if ($cliente_id && $fecha && $actividad && is_numeric($gasto)) {
        $stmt = $conexion->prepare("INSERT INTO historial (cliente_id, fecha, actividad, gasto) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("issd", $cliente_id, $fecha, $actividad, $gasto);
        if ($stmt->execute()) {
            $mensaje = "<p class='success'>✅ Actividad registrada correctamente.</p>";
        } else {
            $mensaje = "<p class='error'>❌ Error: " . htmlspecialchars($conexion->error) . "</p>";
        }
        $stmt->close();
    } else {
        $mensaje = "<p class='error'>❌ Todos los campos son obligatorios.</p>";
    }
}

// Obtener lista de clientes para el formulario
$clientes = $conexion->query("SELECT id, nombre, apellido FROM clientes");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Actividad - Historial</title>
  <link rel="stylesheet" href="../css/historial.css">
    <link rel="stylesheet" href="../css/btns.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/footer_sep.css">
</head>
<body>
  <h1>📝 Registro de Actividades de Clientes</h1>

  <?= $mensaje ?>

  <form method="POST" action="registrar_historial.php">
    <label for="cliente_id">Cliente:</label>
    <select name="cliente_id" required>
      <option value="">-- Selecciona un cliente --</option>
      <?php while ($c = $clientes->fetch_assoc()): ?>
        <option value="<?= $c['id'] ?>"><?= $c['nombre'] . ' ' . $c['apellido'] ?></option>
      <?php endwhile; ?>
    </select>

    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" required>

    <label for="actividad">Actividad:</label>
    <input type="text" name="actividad" placeholder="Ej: Jugó en ruleta, consumió en bar..." required>

    <label for="gasto">Gasto (S/):</label>
    <input type="number" name="gasto" step="0.01" required>

    <button type="submit">Registrar</button>
  </form>

<div class="btn-container">
  <a href="../index.html" class="btn">🏠 Volver al Inicio</a>
  <a href="listar_historial.php" class="btn">📜 Ver Historial de Clientes</a>
</div>

<!------------------------Boton de whatsapp-------------------->
<a href="https://wa.me/51921876815" class="wsp-btn" target="_blank" title="Contáctanos por WhatsApp">
      <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp">
    </a>

<!------------------------Boton de whatsapp-------------------->
</body>
</html>

<?php $conexion->close(); ?>
