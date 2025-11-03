<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require '/Applications/XAMPP/htdocs/perfumesite/mvcshop/vendor/autoload.php';

class Otps extends Controller{ 
    protected $usermodel;
    protected $otpmodel;

    public function __construct()
    {
        $this->usermodel = $this->model('User');
        $this->otpmodel = $this->model('Otp');
    }

    public function otp(){
        $otp = $this->generateOtpCode(6);
        $otp_hash = password_hash($otp,PASSWORD_DEFAULT);
        $userid = $_SESSION['session_uid'];
        // $toEmail = $_SESSION['session_email'];
        $toEmail = 'hsumyatm7308@gmail.com';
        $expires = (new DateTime("+5 minutes"))->format('Y-m-d H:i:s');
        $storeotp = $this->otpmodel->storeotp($otp_hash,$userid,$expires);

        if($storeotp){
            $this->sendEmailOtp($toEmail,$otp);
        }
        $this->view('otps/otp');
    }

    public function generateOtpCode(int $digits = 6):string {
        $min = (int) pow(10,$digits-1);
        $max = (int) (pow(10,$digits) - 1);
        return (string) random_int($min,$max);
    }

    // Mail Server 
    public function sendEmailOtp($toEmail,$otp){
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
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