<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

$id = $_GET['id'];
$resultado = $conexion->query("SELECT * FROM clientes WHERE id = $id");
$cliente = $resultado->fetch_assoc();
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
    <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $cliente['nombre']; ?>" required>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" value="<?php echo $cliente['apellido']; ?>" required>

    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni" value="<?php echo $cliente['dni']; ?>" required>

    <label for="email">Correo:</label>
    <input type="email" id="email" name="email" value="<?php echo $cliente['email']; ?>">

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" value="<?php echo $cliente['telefono']; ?>">

    <label for="preferencias">Preferencias:</label>
    <textarea id="preferencias" name="preferencias"><?php echo $cliente['preferencias']; ?></textarea>

    <div class="botones">
      <button type="submit" class="btn btn">Actualizar</button>
      <a href="listar_clientes.php" class="btn btn-volver">Volver</a>
    </div>
  </form>
</body>
</html>
