<?php
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;

    require('PHPMailer/src/Exception.php');
    require('PHPMailer/src/PHPMailer.php');
    require('PHPMailer/src/SMTP.php');

    class mailer_helper {
        public function sendMail($email, $message, $subject, $email_bcc=null)
        {
            $mail = new PHPMailer();
            // $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->isSMTP();
            // $mail->SMTPDebug = 2;
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;

            // $mail->Password = 'tcjetvgblcilleew';
            $mail->Username = "ps2104001@gmail.com";
            $mail->Password = "tcjetvgblcilleew";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
  
            //Recipients
            $mail->setFrom('example@gmail.com', '【ohr】');
            $mail->addAddress($email);
            $mail->addBCC($email_bcc);

            // Content
            // $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->CharSet = 'UTF-8';
            $mail->addCustomHeader('MIME-Version: 1.0');
            $mail->addCustomHeader('Content-Type: text/plain; charset=utf-8');
            if($mail->send()) {
                // echo 'Message has been sent';
                return true;
            }
            else{
                // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                return false;
            }
        }
    }
