<?php

require("class.phpmailer.php");
require("class.smtp.php");

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["comentario"];
$fecha = $_POST["fecha"];
$nacionalidad = $_POST["nacionalidad"];
$carrera = $_POST["carrera"];
$titulo = $_POST["titulo"];


$destinatario = "yuguets@gmail.com";

// Datos de la cuenta de correo utilizada para enviar v�a SMTP
$smtpHost = "mail.dantevaweb.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "eycommerce@dantevaweb.com";  // Mi cuenta de correo
$smtpClave = "RE=No,5o*&5-";  // Mi contrase�a

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 587; 
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";

// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;


$mail->From = 'eycommerce@dantevaweb.com'; // Email desde donde env�o el correo.
$mail->FromName = 'Instituto Yuguets';
$mail->AddAddress($destinatario); // Esta es la direcci�n a donde enviamos los datos del formulario
$mail->AddAddress($email);

$mail->Subject = "Inscripción Instituto Yuguets"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "
<html> 

<body> 

<h1>Gracias por inscribirse en el Instituto Yuguets</h1>

<p>Su mensaje fue:</p>

<p>nombre: {$nombre}</p>

<p>email: {$email}</p>

<p>telefono: {$telefono}</p>

<p>mensaje: {$mensaje}</p>

<p>fecha: {$fecha}</p>

<p>nacionalidad: {$nacionalidad}</p>

<p>Carrera de Interes:<p>

<p>{$carrera}</p>

<p>Estudios Cursados:<p>

<p>{$titulo}</p>

<p>Recuerde que este es un mensaje generado en forma automatica, no lo responda.<br>
    En caso de querer enviarnos otro mail hagalo a <b><i>Email contacto yuguets</b></i><br>
    Muchas Gracias!<br>Instituto Yuguets.</p>

</body> 

</html>

<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo "El correo fue enviado correctamente.";
} else {
    echo "Ocurri� un error inesperado.";
}







?>
