
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel= "stylesheet" href ="css/footer_sep.css">
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

      <a href="https://wa.me/51921876815" class="wsp-btn" target="_blank" title="Contáctanos por WhatsApp">
      <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp">
    </a>
</body>
</html>
