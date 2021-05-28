<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include_once "../login/php/conexion_be.php";
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

$sentencia = $conexion->prepare("UPDATE citas SET aceptada = 'true' WHERE id =" . $_GET['id']);
$sentencia->execute();


$consulta = $conexion->query("SELECT c.id, c.horacita, c.diacita, u.usuario, u.correo FROM citas c INNER JOIN usuarios u ON c.usuario = u.usuario WHERE c.id =" . $_GET['id']);
$resultados = $consulta->fetch_assoc();

$horaCita = $resultados['horacita'];
$diaCita = $resultados['diacita'];
$usuario = $resultados['usuario'];
$correo = $resultados['correo'];
$titulo = 'Cita confirmada';
$msjCorreo = "Su cita del día " . $diaCita . " a las " . $horaCita . " ha sido confirmada";

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

    $mail->SMTPDebug = 0;    
    $mail->SMTPAuth   = true; 
    $mail->SMTPSecure = 'tls';                                      //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Host       = 'smtp.gmail.com';                           //Set the SMTP server to send through
    $mail->Port       = 587;                                        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->isHTML(true);                                            //Set email format to HTML
    $mail->Username   = 'mariobarberdaw@gmail.com';                 //SMTP username
    $mail->Password   = 'administrador';                            //SMTP password
             
                                        

    //Recipients
    $mail->addAddress($correo, $usuario);
    $mail->setFrom('helpmario@gmail.com', 'Dudas');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Content
                                      
    $mail->Subject = $titulo;
    $mail->Body    = $msjCorreo;

    $mail->send();
    $_SESSION['mensaje'] = "Se ha aceptado la cita correctamente";
    header("location: ../citas.php");
} catch (Exception $e) {
    echo "Se ha producido un error: {$mail->ErrorInfo}";
}
?>