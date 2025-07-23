
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
        <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'incorrecto') {
                    echo '<p class="error">Contraseña incorrecta</p>';
                } elseif ($_GET['error'] == 'noexiste') {
                    echo '<p class="error">El usuario no existe</p>';
                } elseif ($_GET['error'] == 'datos_incompletos') {
                    echo '<p class="error">Por favor completa todos los campos</p>';
                }
            }
        ?>
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="clave" placeholder="Contraseña" required>
    <button type="submit">Entrar</button>
    <p>¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
  </form>
</body>
</html>
