<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //require "../../../initialize.php";
    //require '../_lib/data.php';
   // require '../_lib/PHPMailer.php';
    require '../_lib/mail.php';
    require '../_lib/PHPMailer-SMTP.php';
   

    $x = [];

    $_POST['content']="this is the content i hope it's long enough";
    $_POST['email']="stephenarthor90@gmail.com";

    $sender = $dt->getData("email");
    $dt->minimum = 10;
    $dt->check("if_empty,if_email,if_minimum");

    $content = $dt->getData("content");
    $dt->minimum = 20;
    $dt->check("if_empty,if_minimum");

    if ($dt->there_is_error()) {
        $x['dd_success'] = false;
        $x['dd_feedback'] = $dt->error; 
    }

    else {
        // Send mail
        $mail->Subject = "$sender sent you an email from your website";
        $mail->Body    = $content. "<br> <h3> Reply to $sender </h3>"; //'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = $content. "--------- Reply to $sender" ; //'This is the body in plain text for non-HTML mail clients';

        echo $mail->send();
    }
    
    echo json_encode($x);