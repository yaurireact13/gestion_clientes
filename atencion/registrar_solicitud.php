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

  <form action="guardar_solicitud.php" method="POST">
    <label>Cliente:</label><br>
    <select name="cliente_id" required>
      <?php
      $conexion = new mysqli("localhost", "root", "", "atlantic_city_db");
      $result = $conexion->query("SELECT id, nombre, apellido FROM clientes");
      while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['id']}'>{$row['nombre']} {$row['apellido']}</option>";
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
