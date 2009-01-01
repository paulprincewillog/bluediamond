<?php 


require "../../../initialize.php";
require '../_lib/data.php';
require 'PHPMailer-Exception.php';




    class Mail{

        public $Subject;
        public $Body;
        public $AltType;

        public function __construct(){
            $this->Subject=" ";
            $this->Body=" ";
            $this->AltType=" ";
        }

        

        public function send(){
            
            try {
                //Server settings
                // $mailer->SMTPDebug = SMTP::DEBUG_CONNECTION;                      // Enable verbose debug output
                $mailer = new PHPMailer(true);
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
                
                return true;
    
        } catch (Exception $e) {

           // echo "Message could not be sent. Contact admin "; //. Mailer Error: {$mailer->ErrorInfo}";
           
           $x['dd_success'] = false;
           $x['dd_feedback'] = $mailer->ErrorInfo;// "Failed to send email, Call instead"; 

           return $x['dd_feedback'];
       }
    }
}

$mail = new Mail();
echo "class is set";
?>