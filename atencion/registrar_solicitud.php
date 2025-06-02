<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cliente_id = $_POST['cliente_id'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';

    if ($cliente_id && $tipo && $descripcion) {
        $stmt = $conexion->prepare("INSERT INTO solicitudes_atencion (cliente_id, tipo, descripcion) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $cliente_id, $tipo, $descripcion);
        if ($stmt->execute()) {
            
            header("Location: listar_solicitudes.php?mensaje=1");
            exit;
        } else {
            $mensaje = "<span style='color:red;'>❌ Error al registrar: " . htmlspecialchars($conexion->error) . "</span>";
        }
        $stmt->close();
    } else {
        $mensaje = "<span style='color:red;'>❌ Todos los campos son obligatorios.</span>";
    }
}

$result = $conexion->query("SELECT id, nombre, apellido FROM clientes");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Solicitud</title>
  <link rel="stylesheet" href="../css/atencion.css">
  <link rel="stylesheet" href="../css/btns.css">
  <link rel="stylesheet" href="../css/footer_sep.css">
</head>
<body>
  <h1>📞 Registrar Solicitud de Atención</h1>

  <?php if (!empty($mensaje)) echo "<p>$mensaje</p>"; ?>

  <form action="registrar_solicitud.php" method="POST">
    <label>Cliente:</label><br>
    <select name="cliente_id" required>
      <?php
      while ($row = $result->fetch_assoc()) {
          $id = htmlspecialchars($row['id']);
          $nombre = htmlspecialchars($row['nombre']);
          $apellido = htmlspecialchars($row['apellido']);
          echo "<option value='{$id}'>{$nombre} {$apellido}</option>";
      }
      ?>
    </select><br><br>

    <label>Tipo de solicitud:</label><br>
    <select name="tipo" required>
      <option value="queja">Queja</option>
      <option value="duda">Duda</option>
      <option value="sugerencia">Sugerencia</option>
    </select><br><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion" rows="4" cols="50" required></textarea><br><br>

    <button type="submit">Enviar Solicitud</button>
  </form>

  <br><a href="../index.html" class="btn">🏠 Volver al Inicio</a>

  <!------------------------Boton de whatsapp-------------------->
  <a href="https://wa.me/51921876815" class="wsp-btn" target="_blank" title="Contáctanos por WhatsApp">
      <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp">
  </a>
  <!------------------------Boton de whatsapp-------------------->

</body>
</html>

<?php $conexion->close(); ?>
