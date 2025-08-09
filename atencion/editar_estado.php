
<?php
// ---------------------------------------------
// Script para editar el estado de una solicitud de atención
// Incluye conexión, obtención de datos, actualización y formulario
// ---------------------------------------------

$conexion = new mysqli("localhost", "root", "", "atlantic_city_db"); // Conexión a la base de datos

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$id = $_GET['id'] ?? 0;
$id = (int)$id;

// Si se envió el formulario por POST, actualiza el estado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nuevo_estado = $_POST['estado'] ?? '';

  if ($nuevo_estado && in_array($nuevo_estado, ['pendiente', 'en proceso', 'resuelto'])) {
    $stmt = $conexion->prepare("UPDATE solicitudes_atencion SET estado=? WHERE id=?");
    $stmt->bind_param("si", $nuevo_estado, $id);
    if ($stmt->execute()) {
      header("Location: listar_solicitudes.php?mensaje=2");
      exit;
    } else {
      echo "❌ Error al actualizar: " . htmlspecialchars($conexion->error);
      exit;
    }
    $stmt->close();
  } else {
    echo "❌ Estado inválido.";
    exit;
  }
}

// Obtener los datos actuales de la solicitud
$resultado = $conexion->query("SELECT * FROM solicitudes_atencion WHERE id=$id");
$solicitud = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Estado</title>
  <link rel="stylesheet" href="../css/editar_estados.css">
  <link rel= ""stylesheet" href="../css/btns.css">
</head>
<body>
  <h2>✏️ Cambiar Estado de la Solicitud #<?php echo htmlspecialchars($id); ?></h2>

  <form method="POST">
    <label>Estado actual: <strong><?php echo htmlspecialchars($solicitud['estado']); ?></strong></label><br><br>

    <label>Nuevo estado:</label>
    <select name="estado" required>
      <option value="pendiente" <?= $solicitud['estado'] === 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
      <option value="en proceso" <?= $solicitud['estado'] === 'en proceso' ? 'selected' : '' ?>>En proceso</option>
      <option value="resuelto" <?= $solicitud['estado'] === 'resuelto' ? 'selected' : '' ?>>Resuelto</option>
    </select><br><br>

    <button type="submit">Guardar Cambios</button>
  </form>

  <br><a href="listar_solicitudes.php" class="btn">🏠 Volver</a>
</body>
</html>
