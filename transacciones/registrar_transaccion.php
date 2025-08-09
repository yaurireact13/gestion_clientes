<?php
// ---------------------------------------------
// Script para registrar una nueva transacción de un cliente
// Incluye conexión a la base de datos, inserción y formulario
// ---------------------------------------------

// Conexión a la base de datos MySQL
$conn = new mysqli("localhost", "root", "", "atlantic_city_db");
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Si el formulario fue enviado por POST, procesa los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $cliente_id = $_POST['cliente_id']; // ID del cliente seleccionado
  $tipo = $_POST['tipo'];             // Tipo de transacción (ej: apuesta, recarga)
  $gasto = $_POST['gasto'];           // Monto de la transacción
  $fecha = date('Y-m-d H:i:s');       // Fecha y hora actual

  // Inserta la transacción en la base de datos
  $sql = "INSERT INTO transacciones (cliente_id, tipo, gasto, fecha) 
      VALUES ('$cliente_id', '$tipo', '$gasto', '$fecha')";

  if ($conn->query($sql) === TRUE) {
    $mensaje = "Transacción registrada correctamente.";
  } else {
    $mensaje = "Error: " . $conn->error;
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Transacción</title>
  <link rel="stylesheet" href="../css/transaccion.css">
  <link rel="stylesheet" href="../css/btns.css">
  <link rel="stylesheet" href="../css/footer_sep.css">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
    <!-------------------------HEADER-------------------------------->
  <header>
    <h1>💳 Transacciones de Clientes</h1>
    <a href="../index.html" class="btn">🏠 Volver al inicio</a>
    <a href="listar_transaccion.php" class="btn">📋 Listar Transacciones</a>
  </header> 
</div> <br>
  <!-------------------------HEADER-------------------------------->
  <div class="form-container">
    <h2>Registrar Transacción</h2>

    <?php if (isset($mensaje)) echo "<p class='mensaje'>$mensaje</p>"; ?>

    <form method="POST" action="">
      <label for="cliente_id">Cliente:</label>
      <select name="cliente_id" required>
        <option value="">-- Selecciona Cliente --</option>
        <?php
        // Consulta para obtener la lista de clientes y mostrar en el select
        $clientes = $conn->query("SELECT id, nombre FROM clientes");
        while ($cliente = $clientes->fetch_assoc()) {
            echo "<option value='" . $cliente['id'] . "'>" . $cliente['nombre'] . "</option>";
        }
        ?>
      </select>

      <label for="tipo">Tipo de Transacción:</label>
      <input type="text" name="tipo" placeholder="Ej: recarga, apuesta" required>

      <label for="gasto">Gasto (S/):</label>
      <input type="number" step="0.01" name="gasto" placeholder="Monto" required>

      <button type="submit">Registrar</button>
    </form>
  </div>

  <!------------------------Boton de whatsapp-------------------->
<a href="https://wa.me/51921876815" class="wsp-btn" target="_blank" title="Contáctanos por WhatsApp">
      <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp">
    </a>

<!------------------------Boton de whatsapp-------------------->
</body>
</html>

<?php $conn->close(); ?>
