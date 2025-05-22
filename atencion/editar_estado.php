<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nuevo_estado = $_POST['estado'];

  $conexion->query("UPDATE solicitudes_atencion SET estado='$nuevo_estado' WHERE id=$id");

  echo "✅ Estado actualizado correctamente. <a href='listar_solicitudes.php'>Volver a la lista</a>";
  exit;
}

$resultado = $conexion->query("SELECT * FROM solicitudes_atencion WHERE id=$id");
$solicitud = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Estado</title>
  <link rel="stylesheet" href="../css/editar_estado.css">
  <link rel="stylesheet" href="../css/btns.css">
</head>
<body>
  <h2>✏️ Cambiar Estado de la Solicitud #<?php echo $id; ?></h2>

  <form method="POST">
    <label>Estado actual: <strong><?php echo $solicitud['estado']; ?></strong></label><br><br>

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
