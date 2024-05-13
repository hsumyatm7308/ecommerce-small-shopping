<?php

class Checkouts extends Controller
{
    use Google, ManualLogin, ManualRegister;
    public $allmodal;
    public $sidebarmodal;
    public $pagination;

    public $reviewmodal;
    public $votemodal;

    public $ratingmodal;

    public $recommendmodal;

    public $navbarmodal;
    public $curitemidmodal;

    public $wishmodal;
    public $cardmodal;
    public $usermodel;

    private $googlemodal;



    public function __construct()
    {
        try {
            $this->cardmodal = $this->model('Cart');
            $this->navbarmodal = $this->model('Nav');
            $this->usermodel = $this->model('User');
            $this->pagination = new Pagination();

            require ('Googlelogin.php');
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }



    public function index()
    {
        $orderitemcount = $this->navbarmodal->order_item_count();
        $showship = $this->cardmodal->selectshipcost();
        $userinfo = $this->usermodel->getuserinfo();

        // if ($_SESSION['user_id']) {
        //     $cartitems = $this->cardmodal->cart_items_show();
        // } else {

        // }

        $cartitems = json_decode($_COOKIE['cart'], true);
        $showship = json_decode($_COOKIE['ship'], true);

        $data = [
            'orderitemcount' => $orderitemcount,
            'cartitems' => $cartitems,
            'shipmethod' => $showship,
            'user' => $userinfo

        ];
        $this->view('checkouts/checkout', $data);
    }

    public function authcheck()
    {
        $orderitemcount = $this->navbarmodal->order_item_count();
        $cartitems = $this->cardmodal->cart_items_show();
        $userinfo = $this->usermodel->getuserinfo();

        $data = [];

        $data = [
            'orderitemcount' => $orderitemcount,
            'cartitems' => $cartitems,
            'user' => $userinfo,
            "email" => "",
            "password" => "",
            "emailerr" => "",
            "passworderr" => "",
        ];



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['authchecksubmit'])) {

                $this->manuallogin($data);


            } elseif (isset($_POST['googlelogin'])) {
                $this->googlelogin();
            } elseif (isset($_POST['checkregister'])) {
                $this->manualregister($data);
            }
        }

        $this->view('checkouts/authcheck', $data);
    }







}


trait ManualLogin
{
    public function manuallogin($data)
    {

        $orderitemcount = $this->navbarmodal->order_item_count();
        $cartitems = $this->cardmodal->cart_items_show();
        $userinfo = $this->usermodel->getuserinfo();
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'orderitemcount' => $orderitemcount,
            'cartitems' => $cartitems,
            'user' => $userinfo,

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

            $loginuser = $this->usermodel->login($data['email'], $data['password']);



            if ($loginuser) {
                createusersession($loginuser);
            } else {
                $data['passworderr'] = "Password incorrect";
                $this->view('checkouts/authcheck', $data);

            }


        }
        $this->view('checkouts/authcheck', $data);


    }

}


trait ManualRegister
{
    public function manualregister($data)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $orderitemcount = $this->navbarmodal->order_item_count();
            $cartitems = $this->cardmodal->cart_items_show();
            $userinfo = $this->usermodel->getuserinfo();


            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'orderitemcount' => $orderitemcount,
                'cartitems' => $cartitems,
                'user' => $userinfo,

                "fullname" => trim($_POST['fullname']),
                "email" => trim($_POST['r_email']),
                "password" => trim($_POST['r_password']),
                "comfirmpassword" => trim($_POST['comfirmpassword']),
                "fullnameerr" => "",
                "r_emailerr" => "",
                "r_passworderr" => "",
                "comfirmpassworderr" => "",

            ];

            if (empty($data['fullname'])) {
                $data['fullnameerr'] = "Please enter full name";
            }

            if (empty($data['email'])) {
                $data['r_emailerr'] = "Please enter email";
            } else {

                // check email exist or not 
                if ($this->usermodel->registeremailcheck($data['email'])) {
                    $data['r_emailerr'] = "Email already exist";

                }
            }

            if (empty($data['password'])) {
                $data['r_passworderr'] = "Please enter password";
            } elseif (strlen($data['password']) < 5) {
                $data['r_passworderr'] = "Password must be at least 5 characters";
            }


            if (empty($data['comfirmpassword'])) {
                $data['comfirmpassworderr'] = "Please enter comfirm password";
            } else {
                if ($data['password'] != $data['comfirmpassword']) {

                    $data['comfirmpassworderr'] = "Password doesn't match";

                }
            }


            if (empty($data['fullnameerr']) && empty($data['r_emailerr']) && empty($data['r_passworderr']) && empty($data['comfirmpassworderr'])) {

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                $loginuser = [
                    'fullname' => $data['fullname'],
                    'email' => $data['email'],
                    'password' => $data['password']
                ];

                if ($this->usermodel->register($data)) {

                    createusersession($loginuser);
                    redirect('checkouts/checkout');
                } else {
                    die('Something Wrong');
                }


            }




        }
    }

}



trait Google
{


    // Note :: when I login by google. remove item not done yet
    public function googlelogin()
    {


        $data = [];


        $code = $this->pagination->getparameter()['code'];

        $googleLogin = new Googlelogin();
        $client = $googleLogin->createclient();



        if (isset($code)) {
            $token = $client->fetchAccessTokenWithAuthCode($code);
            $client->setAccessToken($token['access_token']);

            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            $email = $google_account_info->email;
            $name = $google_account_info->name;




            $data = [
                'fullname' => $name,
                'email' => $email,
                'password' => ''
            ];
            // $loginuser = $this->usermodel->login($data['email'], $data['password']);
            // var_dump($loginuser);

            if ($this->usermodel->registeremailcheck($data['email'])) {
                createusersession($data);
                redirect('checkouts/checkout');


            } else {
                if ($this->usermodel->register($data)) {
                    createusersession($data);
                    redirect('checkouts/checkout');
                }
            }

        } else {
            header('Location: ' . filter_var($client->createAuthUrl(), FILTER_SANITIZE_URL));
            exit();
        }



    }
}



function createusersession($user)
{
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['fullname'];
    $_SESSION['user_email'] = $user['email'];
    redirect('checkouts/checkout');
}



?>