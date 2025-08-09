<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/footer_sep.css">
</head>
<body>
  <!-- Formulario de registro de nuevo usuario -->
  <form action="procesar_registro.php" method="POST">
    <h2>Registro</h2>
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="clave" placeholder="Contraseña" required>
    <button type="submit">Registrarse</button>
    <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
  </form>
  <!-- Botón de WhatsApp para contacto rápido -->
  <a href="https://wa.me/51921876815" class="wsp-btn" target="_blank" title="Contáctanos por WhatsApp">
    <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp">
  </a>
</body>
</html>
