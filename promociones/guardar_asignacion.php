<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "atlantic_city_db");

// Validar datos recibidos
if (!isset($_POST['promocion_id'], $_POST['segmento_objetivo'])) {
    die("Datos incompletos.");
}

$promocion_id = intval($_POST['promocion_id']);
$segmento_objetivo = $conexion->real_escape_string($_POST['segmento_objetivo']);

// Obtener los datos de la promoción
$promo_result = $conexion->query("SELECT titulo, descripcion FROM promociones WHERE id = $promocion_id");
$promo = $promo_result->fetch_assoc();

if (!$promo) {
    die("Promoción no encontrada.");
}

// Obtener los clientes del segmento
$clientes = $conexion->query("SELECT id, nombre, apellido, email FROM clientes WHERE segmento = '$segmento_objetivo'");

// Incluir PHPMailer
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



$errores = [];
$exitos = [];

while ($cliente = $clientes->fetch_assoc()) {
    $cliente_id = $cliente['id'];

    // Insertar en promociones_clientes
    $conexion->query("INSERT INTO promociones_clientes (cliente_id, promocion_id) VALUES ('$cliente_id', '$promocion_id')");

    // Enviar correo
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Cambiar si usas otro proveedor
        $mail->SMTPAuth = true;
        $mail->Username = 'yaurileonjob@gmail.com';
        $mail->Password = 'Katyta13.,'; // ⚠️ REEMPLAZAR por app password en producción
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('yaurileonjob@gmail.com', 'Atlantic City Casino');
        $mail->addAddress($cliente['email'], $cliente['nombre'] . ' ' . $cliente['apellido']);

        $mail->isHTML(true);
        $mail->Subject = '¡Nueva Promoción Asignada!';
        $mail->Body = "
            <h2>🎉 ¡Hola {$cliente['nombre']}!</h2>
            <p>Te hemos asignado una promoción exclusiva:</p>
            <p><strong>Promoción:</strong> {$promo['titulo']}</p>
            <p><strong>Descripción:</strong> {$promo['descripcion']}</p>
            <p>¡Te esperamos en Atlantic City para disfrutarla!</p>
        ";

        $mail->send();
        $exitos[] = $cliente['email'];
    } catch (\PHPMailer\PHPMailer\Exception $e) {
        echo "Error al enviar correo a {$cliente['email']}: {$mail->ErrorInfo}<br>";
    }

}

// Mensaje final
echo "<script>
    alert('Promoción asignada al segmento $segmento_objetivo. Correos enviados: " . count($exitos) . "');
    window.location.href='listar_promociones.php';
</script>";
?>
