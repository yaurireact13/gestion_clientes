<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <form action="procesar_registro.php" method="POST">
    <h2>Registro</h2>
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="clave" placeholder="Contraseña" required>
    <button type="submit">Registrarse</button>
    <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
  </form>
</body>
</html>
