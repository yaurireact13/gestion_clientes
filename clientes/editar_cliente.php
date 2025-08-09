
<?php
// ---------------------------------------------
// Script para mostrar el formulario de edición de un cliente
// Obtiene los datos del cliente por su ID
// ---------------------------------------------

$conexion = new mysqli("localhost", "root", "", "atlantic_city_db"); // Conexión a la base de datos

$id = $_GET['id']; // ID del cliente recibido por GET
$resultado = $conexion->query("SELECT * FROM clientes WHERE id = $id"); // Consulta para obtener los datos
$cliente = $resultado->fetch_assoc(); // Obtiene los datos como array asociativo
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Cliente</title>
  <link rel="stylesheet" href="../css/editar_cliente.css">
  <link rel="stylesheet" href="../css/btns.css">
</head>
<body>
  <h1>✏️ Editar Cliente</h1>

  <form action="actualizar_cliente.php" method="POST" class="formulario">
  <!-- Campo oculto para enviar el ID del cliente -->
  <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">

  <!-- Campo para el nombre del cliente -->
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre" value="<?php echo $cliente['nombre']; ?>" required>

  <!-- Campo para el apellido del cliente -->
  <label for="apellido">Apellido:</label>
  <input type="text" id="apellido" name="apellido" value="<?php echo $cliente['apellido']; ?>" required>

  <!-- Campo para el DNI del cliente -->
  <label for="dni">DNI:</label>
  <input type="text" id="dni" name="dni" value="<?php echo $cliente['dni']; ?>" required>

  <!-- Campo para el correo electrónico -->
  <label for="email">Correo:</label>
  <input type="email" id="email" name="email" value="<?php echo $cliente['email']; ?>">

  <!-- Campo para el teléfono -->
  <label for="telefono">Teléfono:</label>
  <input type="text" id="telefono" name="telefono" value="<?php echo $cliente['telefono']; ?>">

  <!-- Campo para las preferencias del cliente -->
  <label for="preferencias">Preferencias:</label>
  <textarea id="preferencias" name="preferencias"><?php echo $cliente['preferencias']; ?></textarea>

  <div class="botones">
    <button type="submit" class="btn btn">Actualizar</button>
    <a href="listar_clientes.php" class="btn btn-volver">Volver</a>
  </div>
  </form>
</body>
</html>
