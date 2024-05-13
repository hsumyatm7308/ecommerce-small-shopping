<?php

ini_set('display_errors', 1);

class Users extends Controller
{


    protected $usermodel;

    public function __construct()
    {
        $this->usermodel = $this->model('User');

    }

    public function register()
    {

        $data = [];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                "fullname" => trim($_POST['fullname']),
                "email" => trim($_POST['email']),
                "password" => trim($_POST['password']),
                "comfirmpassword" => trim($_POST['comfirmpassword']),
                "fullnameerr" => "",
                "emailerr" => "",
                "passworderr" => "",
                "comfirmpassworderr" => "",

            ];

            if (empty($data['fullname'])) {
                $data['fullnameerr'] = "Please enter full name";
            }

            if (empty($data['email'])) {
                $data['emailerr'] = "Please enter email";
            } else {

                // check email exist or not 
                if ($this->usermodel->registeremailcheck($data['email'])) {
                    $data['emailerr'] = "Email already exist";

                }
            }

            if (empty($data['password'])) {
                $data['passworderr'] = "Please enter password";
            } elseif (strlen($data['password']) < 5) {
                $data['passworderr'] = "Password must be at least 5 characters";
            }


            if (empty($data['comfirmpassword'])) {
                $data['comfirmpassworderr'] = "Please enter comfirm password";
            } else {
                if ($data['password'] != $data['comfirmpassword']) {

                    $data['comfirmpassworderr'] = "Password doesn't match";

                }
            }


            if (empty($data['fullnameerr']) && empty($data['emailerr']) && empty($data['passworderr']) && empty($data['comfirmpassworderr'])) {
                // die('success');

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->usermodel->register($data)) {

                    // $redirecturl = URLROOT . '/users/login';
                    // header('location:' . $redirecturl);


                    // flash("register_success", "You are registered successfully");
                    redirect('users/login');
                } else {
                    die('Something Wrong');
                }

            } else {
                $this->view('users/register', $data);

            }


            $this->view('users/register', $data);


        } else {
            $data = [
                "fullname" => "",
                "email" => "",
                "password" => "",
                "comfirmpassword" => "",
                "fullnameerr" => "",
                "emailerr" => "",
                "passworderr" => "",
                "comfirmpassworderr" => "",

            ];

            $this->view('users/register', $data);

        }


    }

    public function login()
    {
        $data = [];


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            $data = [
                "email" => trim($_POST['email']),
                "password" => trim($_POST['password']),
                "emailerr" => "",
                "passworderr" => "",

            ];



            // validate password 
            if (empty($data['email'])) {
                $data['emailerr'] = "Please enter email";
            } else {

                if ($this->usermodel->registeremailcheck($data['email'])) {


                } else {
                    $data['emailerr'] = "No user founded";
                }
            }







            if (empty($data['password'])) {
                $data['passworderr'] = "Please enter password";
            }



            if (empty($data['emailerr']) && empty($data['passworderr'])) {
                // die('success');

                $loginuser = $this->usermodel->login($data['email'], $data['password']);

                if ($loginuser) {

                    // die('sussessful login');


                    $this->createusersession($loginuser);
                } else {
                    $data['passworderr'] = "Password incorrect";
                    $this->view('users/login', $data);

                }


            } else {


                $this->view('users/login', $data);


            }







        } else {
            $data = [
                "email" => "",
                "password" => "",
                "emailerr" => "",
                "passworderr" => "",

            ];

            $this->view('users/login', $data);
        }


    }


    public function createusersession($user)
    {



        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];



        redirect('mainpage/index');
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