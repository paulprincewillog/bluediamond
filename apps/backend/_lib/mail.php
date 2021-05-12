<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer.php';
    require 'PHPMailer-SMTP.php';
    require 'PHPMailer-Exception.php';

    Class mail {
        
        private $mail;
        private $host       = EMAIL_HOST; 
        private $username   = EMAIL_USERNAME;
        private $password   = EMAIL_PASSWORD;
        public $sender = "Firstonlinemarket.com";
        public $receiver;

        public $subject;
        public $body;
        public $alt_body = "";

        public $isSuccessful = false;
        public $feedback = "";
        
        function __construct() {
            $this->mail = new PHPMailer(true);
        }

        private function set() {

            //Server settings
            // $this->mail->SMTPDebug = SMTP::DEBUG_CONNECTION;                      // Enable verbose debug output
            $this->mail->isSMTP();                                            // Send using SMTP
            $this->mail->Host       = $this->host;                    // Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->mail->Username   = $this->username;                     // SMTP username
            $this->mail->Password   = $this->password;                           // SMTP password
            // $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $this->mail->Port       = 25;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $this->mail->setFrom($this->username, $this->sender);
            $this->mail->addAddress($this->receiver, $this->receiver);

            // Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = $this->subject;
            $this->mail->Body    = $this->body; //'This is the HTML message body <b>in bold!</b>';
            $this->mail->AltBody = $this->alt_body; //'This is the body in plain text for non-HTML mail clients';

        }
        
        public function send() {
            
            $this->set();

            try {
                
                $this->mail->send();
                $this->isSuccessful = true;
                $this->feedback = "Mail was successfully sent";
                
            } catch (Exception $e) {

                // echo "Message could not be sent. Contact admin "; //. Mailer Error: {$this->mail->ErrorInfo}";
            
                $this->isSuccessful = false;
                $this->feedback = $this->mail->ErrorInfo;// "Failed to send email, Call instead"; 
            }
        }

    }
        

$mail = new mail;
$GLOBALS['mail'] = $mail;