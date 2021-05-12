<?php

    require "../../../initialize.php";
    require '../_lib/data.php';
    require '../_lib/mail.php';
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
        
      
            $mail->Subject = "$sender sent you an email from your website";
            $mail->Body    = $content. "<br> <h3> Reply to $sender </h3>"; //'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = $content. "--------- Reply to $sender" ; //'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            if ($mail->isSuccessful) {
                $x['dd_success'] = true;
                $x['dd_feedback'] = " <p class='email_success'> Your email has been sent, we will send a reply as soon we can. </p> "; 
            } else {
                $x['dd_success'] = false;
                $x['dd_feedback'] = "Failed to send email, Call instead"; // $mail->ErrorInfo;
            }

        }
        
    }
    
    echo json_encode($x);