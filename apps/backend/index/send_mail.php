<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require "../../../initialize.php";
    require '../_lib/data.php';
    require '../_lib/PHPMailer.php';
    require '../_lib/PHPMailer-SMTP.php';
    require '../_lib/PHPMailer-Exception.php';
    require '../_lib/mail.php';
   
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

   /*

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require "../../../initialize.php";
    require '../_lib/data.php';
    require '../_lib/PHPMailer.php';
    require '../_lib/PHPMailer-SMTP.php';
    require '../_lib/PHPMailer-Exception.php';
    $x = [];

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
        
        $mailer = new PHPMailer(true);
            
        try {
            //Server settings
            // $mailer->SMTPDebug = SMTP::DEBUG_CONNECTION;                      // Enable verbose debug output
            $mailer->isSMTP();                                            // Send using SMTP
            $mailer->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mailer->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mailer->Username   =  ADMIN_EMAIL;                     // SMTP username
            $mailer->Password   = ADMIN_PASSWORD;                               // SMTP password
            $mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mailer->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mailer->setFrom('otwopaul@gmail.com', 'Your website');
            $mailer->addAddress('otwopaul@gmail.com', 'Paul Princewill');

            // Content
            $mailer->isHTML(true);                                  // Set email format to HTML
            $mailer->Subject = "$sender sent you an email from your website";
            $mailer->Body    = $content. "<br> <h3> Reply to $sender </h3>"; //'This is the HTML message body <b>in bold!</b>';
            $mailer->AltBody = $content. "--------- Reply to $sender" ; //'This is the body in plain text for non-HTML mail clients';

            $mailer->send();
            // echo 'Message has been sent';
            
            $x['dd_success'] = true;
            $x['dd_feedback'] = " <p class='email_success'> Your email has been sent, we will send a reply as soon we can. </p> "; 

        } catch (Exception $e) {

            // echo "Message could not be sent. Contact admin "; //. Mailer Error: {$mailer->ErrorInfo}";
            
            $x['dd_success'] = false;
            $x['dd_feedback'] = $mailer->ErrorInfo;// "Failed to send email, Call instead"; 
        }
        
        // Send mail
        $mail->Subject = "$sender sent you an email from your website";
        $mail->Body    = $content. "<br> <h3> Reply to $sender </h3>"; //'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = $content. "--------- Reply to $sender" ; //'This is the body in plain text for non-HTML mail clients';

        $mail->send();
    }
    
    echo json_encode($x);
    */