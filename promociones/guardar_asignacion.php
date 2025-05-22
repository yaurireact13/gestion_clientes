<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

// Incluir PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Asegúrate de que esta ruta sea correcta

$promocion_id = $_POST['promocion_id'];
$segmento_objetivo = $_POST['segmento_objetivo'];

// Obtener los clientes del segmento seleccionado
$clientes = $conexion->query("SELECT c.id, c.nombre, c.apellido, c.email FROM clientes c WHERE c.segmento_objetivo = '$segmento_objetivo'");

while ($cliente = $clientes->fetch_assoc()) {
    // Asignar la promoción a cada cliente
    $cliente_id = $cliente['id'];
    $conexion->query("INSERT INTO promociones_clientes (cliente_id, promocion_id) VALUES ('$cliente_id', '$promocion_id')");

    // Enviar correo de notificación
    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor de correo
        $mail->isSMTP();
        $mail->Host = 'yaurileonjob@gmail.com';  // Usa el servidor SMTP de tu proveedor (ej: Gmail, Mailgun)
        $mail->SMTPAuth = true;
        $mail->Username = 'yaurileonjob@gmail.com'; // Tu correo
        $mail->Password = 'Katyta13.,'; // Tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinatario
        $mail->setFrom('yaurileonjob@gmail.com', 'Atlantic City Casino');
        $mail->addAddress($cliente['email'], $cliente['nombre'] . ' ' . $cliente['apellido']); // Correo del cliente

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = '¡Promoción Asignada! 🎉';
        $mail->Body    = "
            <h1>¡Hola {$cliente['nombre']}!</h1>
            <p>Se te ha asignado una nueva promoción en el Casino Atlantic City:</p>
            <p><strong>Promoción:</strong> {$_POST['titulo']}<br>
            <strong>Descripción:</strong> {$_POST['descripcion']}</p>
            <p>No olvides visitarnos para aprovechar tu beneficio.</p>
            <p>¡Te esperamos!</p>
        ";

        // Enviar el correo
        $mail->send();
        echo 'Correo enviado a ' . $cliente['email'] . '<br>';
    } catch (Exception $e) {
        echo "Error al enviar correo a {$cliente['email']}: {$mail->ErrorInfo}<br>";
    }
}

echo "<script>alert('Promoción asignada a los clientes del segmento_objetivo $segmento_objetivo'); window.location.href='listar_promociones.php';</script>";
?>
