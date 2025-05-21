<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

$id = $_GET['id'];
$resultado = $conexion->query("SELECT * FROM promociones WHERE id = $id");
$promocion = $resultado->fetch_assoc();
?>

<h1>✏️ Editar Promoción</h1>
<form action="actualizar_promocion.php" method="POST" class="formulario">
  <input type="hidden" name="id" value="<?php echo $promocion['id']; ?>">
  <input type="text" name="titulo" value="<?php echo $promocion['titulo']; ?>" required>
  <textarea name="descripcion"><?php echo $promocion['descripcion']; ?></textarea>
  <label>Fecha de Inicio:</label>
  <input type="date" name="fecha_inicio" value="<?php echo $promocion['fecha_inicio']; ?>" required>
  <label>Fecha de Fin:</label>
  <input type="date" name="fecha_fin" value="<?php echo $promocion['fecha_fin']; ?>" required>
  <input type="text" name="segmento_objetivo" value="<?php echo $promocion['segmento_objetivo']; ?>" placeholder="Segmento (ej: VIP, Jugadores frecuentes,Novato)">
  <button type="submit">Actualizar</button>
</form>
