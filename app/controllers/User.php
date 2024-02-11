<?php

class User extends Controller
{


    public function __construct()
    {

    }

    public function register()
    {
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            $data = [
                "fullname" => trim($_POST['fullname']),
                "email" => trim($_POST['email']),
                "password" => trim($_POST['password']),
                "comfirmpassword" => trim($_POST['comfirmpassword'])

            ];

        }

        $this->view('user/register', $data);

    }

    public function login()
    {
        $this->view('user/login');

    }


}


?>