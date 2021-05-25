<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$titulo = 'Duda';
$msjCorreo = "Nombre: $nombre</br> E-Mail: $email</br> Mensaje:</br> $mensaje";

$mail = new PHPMailer();

try {
    //Server settings
    
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );

    $mail->SMTPDebug = 2;    
    $mail->SMTPAuth   = true; 
    $mail->SMTPSecure = 'tls';                                      //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Host       = 'smtp.gmail.com';                           //Set the SMTP server to send through
    $mail->Port       = 587;                                        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->isHTML(true);                                            //Set email format to HTML
    $mail->Username   = 'mariobarberdaw@gmail.com';                 //SMTP username
    $mail->Password   = 'administrador';                            //SMTP password
             
                                        

    //Recipients
    $mail->addAddress('mariobarberdaw@gmail.com', 'Administrador');
    $mail->setFrom('helpmario@gmail.com', 'Dudas');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Content
                                      
    $mail->Subject = $titulo;
    $mail->Body    = $msjCorreo;

    $mail->send();
    echo '<script>
        alert "El mensaje se ha enviado correctamente";
        windows.location = "contacto.php";
    </script>';
} catch (Exception $e) {
    echo "Se ha producido un error: {$mail->ErrorInfo}";
}
?>