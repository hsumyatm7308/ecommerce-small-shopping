<?php

// ini_set('display_errors', 1);
// ini_set('display_errors', 0);
// ini_set('log_errors', 1);
// error_reporting(E_ALL);

class Users extends Controller
{


    protected $usermodel;

    public function __construct()
    {
        $this->usermodel = $this->model('User');

    }
    // 1Aa@23456


    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                header("Content-Type: application/json; charset=UTF-8");
                $input = json_decode(file_get_contents("php://input"), true);

                if (!$input) {
                    throw new Exception("Invalid JSON sent from frontend.");
                }

                $data = [
                    'username' => htmlspecialchars(trim($input['username'] ?? ''), ENT_QUOTES, 'UTF-8'),
                    'email' => htmlspecialchars(trim($input['email'] ?? ''), ENT_QUOTES, 'UTF-8'),
                    'password' => trim($input['password'] ?? ''),
                    'compassword' => trim($input['compassword'] ?? ''),
                ];


                $pw_sha = hash('sha256',$data['password']);
                $data['password'] = password_hash($pw_sha, PASSWORD_DEFAULT);

                json_encode($data);
                // Call model
                if (!$this->usermodel->registeremailcheck($data['email'])) {
                    if ($this->usermodel->register($data)) {

                        echo json_encode(['status' => 'success', 'redirect' => 'login','data' => $data]);


                    } else {
                        throw new Exception("Registration failed in model.");
                    }
                } else {
                    echo json_encode([
                        'email' => 'true',
                        'data' => $data
                    ]);
                }

            } catch (Exception $e) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            }

            return;
        }

        $this->view('users/register');
    }


    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $input = json_decode(file_get_contents("php://input"), true);

                if (!$input) {
                    throw new Exception("Invalid JSON sent from frontend.");
                }

                $data = [
                    'email' => trim($input['email'] ?? ''),
                    // 'password' => trim($input['password'] ?? ''),
                ];


                $challenge = $this->usermodel->getchallenge($data['email']);
                echo json_encode(['status' => 'success', 'challenge' => $challenge,'data' => $data]);


                // $loginuser = $this->usermodel->login($data['email'], $data['password']);

                // if ($loginuser) {
                //     $this->createusersession($loginuser);
                //     echo json_encode(['status' => 'success']);
                // } else {
                //     echo json_encode(value: ['status' => 'fail', 'email' => 'false', 'password' => 'false']);
                //     // $this->view('users/login', $data);

                // }





            } catch (Exception $e) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            }

            return;
        }

        $this->view('users/login');


    }

    public function verifyChallenge(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            try {
                $input = json_decode(file_get_contents("php://input"), true);

                if (!$input) {
                    throw new Exception("Invalid JSON sent from frontend.");
                }

               

                $data = [
                    'email' => trim($input['email'] ?? ''),
                    'pw_sha' => trim($input['pw_sha'] ?? ''),
                    'response' => trim($input['res_code'] ?? '')
                ];
                $verifyres = $this->usermodel->login($data);

                echo json_encode(['status' => $verifyres]);
                exit;
            } catch (Exception $e) {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
            }

            return;
        }
        $this->view('users/login');

    }

    public function createusersession($user)
    {
        $_SESSION['user_email'] = $user['email'];
        // redirect('mainpage/index');
    }




    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);

        session_destroy();

        redirect('users/login');
    }


}



?>