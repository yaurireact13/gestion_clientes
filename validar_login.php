
<?php
// -----------------------------
// Script para validar el inicio de sesión de un usuario
// Recibe usuario y clave por POST, verifica en la base de datos y gestiona la sesión
// -----------------------------

session_start(); // Inicia la sesión para guardar datos del usuario logueado
include("conexion.php"); // Incluye la conexión a la base de datos

// Verifica que se hayan enviado los datos de usuario y clave por POST
if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $usuario = $_POST['usuario']; // Usuario ingresado
    $clave = $_POST['clave'];     // Clave ingresada

    // Si algún campo está vacío, redirige con error
    if (empty($usuario) || empty($clave)) {
        header("Location: login.php?error=datos_incompletos");
        exit();
    }

    // Consulta para buscar el usuario en la base de datos
    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexion, $consulta);

    // Si existe el usuario
    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_assoc($resultado);
        
        // Verifica la contraseña usando password_verify (para contraseñas encriptadas)
        if (password_verify($clave, $row['clave'])) {
            // Si la clave es correcta, guarda el usuario en la sesión y redirige al inicio
            $_SESSION['usuario'] = $row['usuario'];
            header("Location: index.html");
            exit();
        } else {
            // Si la clave es incorrecta, redirige con error
            header("Location: login.php?error=incorrecto");
            exit();
        }
    } else {
        // Si el usuario no existe, redirige con error
        header("Location: login.php?error=noexiste");
        exit();
    }
} else {
    // Si no se enviaron los datos por POST, redirige con error
    header("Location: login.php?error=datos_incompletos");
    exit();
}
?>
