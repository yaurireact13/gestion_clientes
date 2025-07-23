<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <form action="validar_login.php" method="POST">
    <h2>Iniciar sesión</h2>
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="clave" placeholder="Contraseña" required>
    <button type="submit">Entrar</button>
    <p>¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
  </form>
</body>
</html>
