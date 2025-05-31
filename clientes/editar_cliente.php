<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

$id = $_GET['id'];
$resultado = $conexion->query("SELECT * FROM clientes WHERE id = $id");
$cliente = $resultado->fetch_assoc();
?>

<h1>✏️ Editar Cliente</h1>
<form action="actualizar_cliente.php" method="POST" class="formulario">
  <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
  <input type="text" name="nombre" value="<?php echo $cliente['nombre']; ?>" required>
  <input type="text" name="apellido" value="<?php echo $cliente['apellido']; ?>" required>
  <input type="text" name="dni" value="<?php echo $cliente['dni']; ?>" required>
  <input type="email" name="email" value="<?php echo $cliente['email']; ?>">
  <input type="text" name="telefono" value="<?php echo $cliente['telefono']; ?>">
  <textarea name="preferencias"><?php echo $cliente['preferencias']; ?></textarea>
  <button type="submit">Actualizar</button>
</form>
