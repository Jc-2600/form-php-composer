<?php

require("mail.php");

function validate($name, $email, $subjet, $message, $form)
{

    return !empty($name) && !empty($email) && !empty($subjet) && !empty($message);
}

$status = "";

if (isset($_POST["form"])) {

    if (validate(...$_POST)) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subjet"];
        $message = $_POST["message"];

        $body = "$name <$email> te envía el siguiente mensaje: <br><br> $message";

        sentMail($subject, $body, $email, $name, true);

        $status = "success";
    } else {
        $status = "danger";
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de contacto</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section id="contact">
        <div class="contact-box">
            <div class="contact-links">
                <h2>¡Contáctanos!</h2>
                <div class="links">
                    <div class="link">
                        <a><img src="https://i.postimg.cc/m2mg2Hjm/linkedin.png" alt="linkedin"></a>
                    </div>
                    <div class="link">
                        <a><img src="https://i.postimg.cc/YCV2QBJg/github.png" alt="github"></a>
                    </div>
                    <div class="link">
                        <a><img src="https://i.postimg.cc/W4Znvrry/codepen.png" alt="codepen"></a>
                    </div>
                    <div class="link">
                        <a><img src="https://i.postimg.cc/NjLfyjPB/email.png" alt="email"></a>
                    </div>
                </div>
            </div>
            <div class="contact-form-wrapper">
                <?php if ($status == "success") : ?>
                    <div class="alert success">
                        <span>¡El formulario se envió con éxito!</span>
                    </div>    
                <?php endif; ?>

                <?php if($status == "danger"): ?>    
                    <div class="alert danger">
                        <span>Surgió un problema con el envío del formulario</span>
                    </div>
                <?php endif; ?>
                

                <form action="./" method="POST">
                    <div class="form-item">
                        <input type="text" name="name" id="name" required>
                        <label for="name">Nombre:</label>
                    </div>
                    <div class="form-item">
                        <input type="email" name="email" id="email" required>
                        <label for="email">Email:</label>
                    </div>
                    <div class="form-item">
                        <input type="text" name="subjet" id="subjet" required>
                        <label for="subjet">Asunto:</label>
                    </div>
                    <div class="form-item">
                        <textarea class="" name="message" id="message" required></textarea>
                        <label for="message">Mensaje:</label>
                    </div>
                    <button type="submit" name="form" class="submit-btn">Enviar</button>
                </form>
            </div>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/5fe15a3dc9.js" crossorigin="anonymous"></script>
</body>

</html>