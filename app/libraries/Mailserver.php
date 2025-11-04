<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require '/Applications/XAMPP/htdocs/perfumesite/mvcshop/vendor/autoload.php';

class Mailserver extends Controller{
        // Mail Server 
    public function sendEmailOtp($toEmail,$otp){
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;         // SMTP::DEBUG_SERVER                     //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'hsumyatm7308@gmail.com';                     //SMTP username
            $mail->Password   = 'jbbrepwljysvexsn';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('hsumyatm7308@gmail.com', 'Perum');
            $mail->addAddress($toEmail);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'OTP verification code';
            $mail->Body    = "Your OTP code is: <b>$otp</b><br>It expires in 5 minutes.";

            $mail->send();
            echo 'Message has been sent to $toEmail\n';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }
}

?>