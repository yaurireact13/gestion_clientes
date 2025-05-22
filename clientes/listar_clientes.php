<head>
  <meta charset="UTF-8">
  <title>📋 Lista de Clientes</title>
  <link rel="stylesheet" href="../css/lista_cliente.css">
  <link rel="stylesheet" href="../css/btns.css">
</head>

<?php
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}

$resultado = $conexion->query("SELECT * FROM clientes");

echo "<h1>📋 Lista de Clientes</h1>";
echo "<a href='registrar_cliente.html' class='btn'>+ Nuevo Cliente</a><br><br>";
echo "<table border='1' cellpadding='10'>
<tr><th>ID</th><th>Nombre</th><th>DNI</th><th>Correo</th><th>Teléfono</th><th>Registro</th><th>Acciones</th></tr>";

while ($fila = $resultado->fetch_assoc()) {
  echo "<tr>
    <td>{$fila['id']}</td>
    <td>{$fila['nombre']} {$fila['apellido']}</td>
    <td>{$fila['dni']}</td>
    <td>{$fila['email']}</td>
    <td>{$fila['telefono']}</td>
    <td>{$fila['fecha_registro']}</td>
    <td>
      <a href='editar_cliente.php?id={$fila['id']}'>✏️ Editar</a> | 
      <a href='eliminar_cliente.php?id={$fila['id']}' onclick=\"return confirm('¿Seguro que deseas eliminar este cliente?');\">🗑️ Eliminar</a>
    </td>
  </tr>";
}

echo "</table>";
echo "<a href='../index.html' class='btn'>🏠 Volver a Inicio";

$conexion->close();
?>
