<?php


class Otps extends Controller{ 
    protected $usermodel;
    protected $otpmodel;
    protected $otpmailserver;
    protected $userid;


    public function __construct()
    {
        $this->usermodel = $this->model('User');
        $this->otpmodel = $this->model('Otp');
        $this->otpmailserver = new OtpMailServer();
        if (isset($_SESSION['session_uid'])) {
            $this->userid = $_SESSION['session_uid'];
        } else {
            // Handle not logged-in case safely
            $this->userid = null;
        }
    }

    public function otp(){
        $otp = $this->generateOtpCode(6);
        $otp_hash = password_hash($otp,PASSWORD_DEFAULT);
        $toEmail = $_SESSION['session_email'];
        // $toEmail = 'hsumyatm7308@gmail.com';
        // $toEmail = 'hsu956653@gmail.com';
        $expires = (new DateTime("+1 minutes"))->format('Y-m-d H:i:s');
        $storeotp = $this->otpmodel->storeotp($otp_hash,$this->userid,$expires);

        if($storeotp){
            $this->otpmailserver->otpMailServer($toEmail,$otp);
        }
        $this->view('otps/otp');
    }

    public function generateOtpCode(int $digits = 6):string {
        $min = (int) pow(10,$digits-1);
        $max = (int) (pow(10,$digits) - 1);
        return (string) random_int($min,$max);
    }

    public function otpVerify(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            try {
                $input = json_decode(file_get_contents("php://input"), true);
                $client_otp = $input['otp'];
                $verifyotp = $this->otpmodel->verifyotp($client_otp,$this->userid);
                if($verifyotp){
                    echo json_encode(['otp_try_status' => true]);
                }else{
                    echo json_encode(['otp_try_status' => false]);
                }
            }catch(Exception $e){
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }



}

?>