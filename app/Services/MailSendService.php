<?php 
    
    namespace App\Services;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class MailSendService
    {
        public function composeEmail() {
            require base_path("vendor/autoload.php");

            $mail = new PHPMailer(true);     // Passing `true` enables exceptions
     
            try {
     
                // Email server settings
                $mail->SMTPDebug = 2;
                $mail->isSMTP();
                $mail->Host = 'mail.mallline.io';
                $mail->SMTPAuth = true;
                $mail->Username = 'developer@mallline.io';
                $mail->Password = 'Gymkhana2307';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 465;
     
                $mail->setFrom('developer@mallline.io', 'Mallline');
                $mail->addAddress('chikhladze.mt@gmail.com');
     
                $mail->isHTML(true);
     
                $mail->Subject = 'Test';
                $mail->Body    = 'Test';
                dd($mail->send());
     
                if( !$mail->send() ) {
                    return false;
                }
                
                else {
                    return true;
                }
     
            } catch (Exception $e) {
                 return false;
            }
        }
    }