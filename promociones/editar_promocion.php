
<?php
// ---------------------------------------------
// Script para mostrar el formulario de edición de una promoción
// Obtiene los datos de la promoción por su ID
// ---------------------------------------------

$conexion = new mysqli("localhost", "root", "", "atlantic_city_db"); // Conexión a la base de datos

$id = $_GET['id']; // ID de la promoción recibido por GET
$resultado = $conexion->query("SELECT * FROM promociones WHERE id = $id"); // Consulta para obtener los datos
$promocion = $resultado->fetch_assoc(); // Obtiene los datos como array asociativo
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Promoción</title>
  <link rel="stylesheet" href="../css/editar_promocion.css">
  <link rel="stylesheet" href="../css/btns.css">
</head>
<body>
  <h1>✏️ Editar Promoción</h1>
  
  <form action="actualizar_promocion.php" method="POST" class="formulario">
    <input type="hidden" name="id" value="<?php echo $promocion['id']; ?>">

    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" value="<?php echo $promocion['titulo']; ?>" required>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion"><?php echo $promocion['descripcion']; ?></textarea>

    <label for="fecha_inicio">Fecha de Inicio:</label>
    <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo $promocion['fecha_inicio']; ?>" required>

    <label for="fecha_fin">Fecha de Fin:</label>
    <input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $promocion['fecha_fin']; ?>" required>

    <label for="segmento_objetivo">Segmento Objetivo:</label>
    <input type="text" id="segmento_objetivo" name="segmento_objetivo" value="<?php echo $promocion['segmento_objetivo']; ?>" placeholder="Segmento (ej: VIP, Jugadores frecuentes, Novato)">

    <br><br>

    <label for="estado">Estado:</label>
    <select id="estado" name="estado" required>
      <option value="activo" <?php echo $promocion['estado'] === 'activo' ? 'selected' : ''; ?>>Activo</option>
      <option value="inactivo" <?php echo $promocion['estado'] === 'inactivo' ? 'selected' : ''; ?>>Inactivo</option>
    </select>

    <div class="botones">
      <button type="submit" class="btn btn-actualizar">Actualizar</button>
      <a href="listar_promociones.php" class="btn btn-volver">Volver</a>
    </div>
  </form>
</body>
</html>
