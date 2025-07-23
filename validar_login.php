<?php
session_start();
include("conexion.php");

if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    if (empty($usuario) || empty($clave)) {
        header("Location: login.php?error=datos_incompletos");
        exit();
    }

    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_assoc($resultado);
        
        // Si estás usando password_hash al registrar:
        if (password_verify($clave, $row['clave'])) {
            $_SESSION['usuario'] = $row['usuario'];
            header("Location: index.html");
            exit();
        } else {
            header("Location: login.php?error=incorrecto");
            exit();
        }
    } else {
        header("Location: login.php?error=noexiste");
        exit();
    }
} else {
    header("Location: login.php?error=datos_incompletos");
    exit();
}
?>
