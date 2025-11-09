<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('Asia/Yangon'); 

class Resetpassword extends Controller{ 

    protected $usermodel;
    protected $resetpwmodel;
    protected $userid;
    private $resetpwmailserver;

    public function __construct()
    {
        $this->usermodel = $this->model('User');
        $this->resetpwmodel = $this->model('Resetpw');
        $this->resetpwmailserver = new ResetPasswordMailServer();
        if (isset($_SESSION['session_uid'])) {
            $this->userid = $_SESSION['session_uid'];
        } else {
            $this->userid = null;
        }

    }

    public function singleresettoken(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            try{
                $input = json_decode(file_get_contents("php://input"), true);
                $email = $input['email'];
                if($this->usermodel->registeremailcheck($email)){
                    $tokenPair = $this->generateResetToken();

                    $expires = (new DateTime("+1 hour"))->format('Y-m-d H:i:s');
                    $storetoken = $this->resetpwmodel->storeresetpwhash($this->userid,$tokenPair['token_hash'],$expires);
                    if($storetoken){
                        $this->resetpwmailserver->resetPwMailServer($email,$tokenPair['token']);
                        echo json_encode(['tokenPair' => $tokenPair]);
                        exit;
                    }else{
                        echo json_encode(['tokenPair' => "noo"]);
                        exit;

                    }
                }else{
                    echo json_encode(['e_registered' => false]);
                    exit;
                }
                exit;
            }catch(Exception $e){
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
                exit;
            }
        }

        $this->view('resetpassword/forgetpw');
    }


    public function generateResetToken(int $bytes = 32):array
    {
        $token = bin2hex(random_bytes($bytes));
        $tokenHash = hash('sha256',$token);
        return ['token'=>$token,'token_hash' => $tokenHash];
    }

    public function resetpassword() {
        $token = $_GET['token'] ?? '';
        $email = $_GET['e'] ?? '';

        if (!$token || !$email) {
            die(json_encode(['status'=>'error','message'=>'Invalid reset link']));
        }

        $this->view('resetpassword/resetpw', [
            'token' => $token,
            'email' => $email
        ]);
    }


public function updatepassword() {


    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $input = json_decode(file_get_contents("php://input"), true);

            $token = $input['token'] ?? null;
            $email = $input['email'] ?? null;
            $newPassword = $input['password'] ?? null;



            if (!$token || !$email || !$newPassword) {
                echo json_encode(['status' => 'error', 'message' => 'Missing data']);
                exit;
            }

            // // Verify token
            $user = $this->resetpwmodel->getUserByEmailAndToken($email, $token);
            if (!$user) {
                echo json_encode(['status' => 'error', 'message' => 'Invalid or expired token']);
                exit;
            }

            // // Hash new password
            $pw_sha = hash('sha256', $newPassword);
            $hashedPassword = password_hash($pw_sha, PASSWORD_DEFAULT);

            // Update password
            if ($this->resetpwmodel->updatePassword($email, $hashedPassword)) {
                $this->resetpwmodel->deletePasswordResetToken($token);
                echo json_encode(['pw_status' => true, 'message' => 'Invalid or expired token']);
                exit;
            } else {
                echo json_encode(['status' => false]);
                exit;
            }



        } catch(Exception $e) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            exit;
        }
    }
}


}
?>