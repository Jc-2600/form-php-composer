<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require("vendor/autoload.php");


function sentMail($subject, $body, $email, $name, $html = false){

    try{
        //configuración inicial de nuestro servicio de correos
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'a316f35b1e08aa';
        $phpmailer->Password = '0a87aeba7b6b59';
    
        //Añadiendo destinatarios
    
        $phpmailer->setFrom('contacto@miempresa.com', 'Mi empresa');
        $phpmailer->addAddress($email, $name);     //Add a recipient
    
        //Definiendo el contenido de mi email 
        $phpmailer->isHTML($html); //Set email format to HTML
        $phpmailer->Subject =  $subject;
        $phpmailer->Body    =  $body;
    
        $phpmailer->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


?>

