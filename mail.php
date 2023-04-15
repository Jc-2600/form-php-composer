<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require("vendor/autoload.php");



//Envio de confirmación de envío al cliente

function sentMailUser($subject, $body, $email, $name, $html = false){

    try{
        //configuración inicial de nuestro servicio de correos
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.gmail.com';
        $phpmailer->SMTPAuth = true;
        $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $phpmailer->Port = 465;
        //Debes cambiar la información que aparece con tú correo y contraseña para aplicaciones
        $phpmailer->Username = 'user';
        $phpmailer->Password = 'password'; 
    
        //Añadiendo destinatarios
    
        $phpmailer->setFrom('contacto@miempresa.com', 'Mi empresa');
        $phpmailer->addAddress($email, $name);     //Add a recipient
    
        //Definiendo el contenido de mi email 
        $phpmailer->isHTML($html); //Set email format to HTML
        $phpmailer->Subject =  $subject;
        $phpmailer->Body    =  $body;
    
        $phpmailer->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
    }
}

//Envío de información del fomulario al administrador

function sentMailAdmin($subject, $body, $name, $html = false)
{

    try {
        //configuración inicial de nuestro servicio de correos
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.gmail.com';
        $phpmailer->SMTPAuth = true;
        $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $phpmailer->Port = 465;
        $phpmailer->Username = 'user';
        $phpmailer->Password = 'password';

        //Añadiendo destinatarios

        $phpmailer->setFrom('contacto@miempresa.com', 'Mi empresa');
        $phpmailer->addAddress('dev.juanlopez.testing@gmail.com', $name);     //Add a recipient

        //Definiendo el contenido de mi email 
        $phpmailer->isHTML($html); //Set email format to HTML
        $phpmailer->Subject =  $subject;
        $phpmailer->Body    =  $body;

        $phpmailer->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
    }
}


?>

