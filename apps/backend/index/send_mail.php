<?php

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
        
        $mail = new PHPMailer(true);
            
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_CONNECTION;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'otwopaul@gmail.com';                     // SMTP username
            $mail->Password   = 'o21997ogheneminE';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('otwopaul@gmail.com', 'Your website');
            $mail->addAddress('otwopaul@gmail.com', 'Paul Princewill');

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "$sender sent you an email from your website";
            $mail->Body    = $content. "<br> <h3> Reply to $sender </h3>"; //'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = $content. "--------- Reply to $sender" ; //'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';
            
            $x['dd_success'] = true;
            $x['dd_feedback'] = " <p class='email_success'> Your email has been sent, we will send a reply as soon we can. </p> "; 

        } catch (Exception $e) {

            // echo "Message could not be sent. Contact admin "; //. Mailer Error: {$mail->ErrorInfo}";
            
            $x['dd_success'] = false;
            $x['dd_feedback'] = $mail->ErrorInfo;// "Failed to send email, Call instead"; 
        }
        
    }
    
    echo json_encode($x);