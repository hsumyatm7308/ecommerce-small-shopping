<?php

class Checkouts extends Controller
{

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


    public function __construct()
    {
        $this->cardmodal = $this->model('Cart');
        $this->navbarmodal = $this->model('Nav');
        $this->usermodel = $this->model('User');
        $this->pagination = new Pagination();

        require ('Googlelogin.php');

    }


    public function index()
    {
        $orderitemcount = $this->navbarmodal->order_item_count();
        $cartitems = $this->cardmodal->cart_items_show();
        $showship = $this->cardmodal->selectshipcost();
        $userinfo = $this->usermodel->getuserinfo();

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




        if (isset($_POST['authchecksubmit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

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
                    $this->createusersession($loginuser);
                } else {
                    $data['passworderr'] = "Password incorrect";
                    $this->view('checkouts/authcheck', $data);

                }


            }


        } else {


            $data = [
                'orderitemcount' => $orderitemcount,
                'cartitems' => $cartitems,
                'user' => $userinfo,

                "email" => "",
                "password" => "",
                "emailerr" => "",
                "passworderr" => "",

            ];
        }

        if (isset($_POST['googlelogin']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            // $this->googlelogin();

            $code = $this->pagination->getparameter()['code'];

            $googleLogin = new Googlelogin();

            $client = $googleLogin->createClient();

            if (isset($code)) {
                $token = $client->fetchAccessTokenWithAuthCode($code);
                $client->setAccessToken($token['access_token']);

                $google_oauth = new Google_Service_Oauth2($client);
                $google_account_info = $google_oauth->userinfo->get();
                $email = $google_account_info->email;
                $name = $google_account_info->name;


                $data = [
                    'name' => $name,
                    'email' => $email,
                    'password' => '12'
                ];

                var_dump($data);
                // if ($this->usermodel->register($data)) {
                //     echo "helloooo I insert";
                // } else {
                //     echo "oh not insert";
                // }




                // $this->createusersession($data);
                // redirect('checkouts/checkout');

            } else {
                header('Location: ' . filter_var($client->createAuthUrl(), FILTER_SANITIZE_URL));
                exit();

            }






        }

        $this->view('checkouts/authcheck', $data);

    }



    public function googlelogin()
    {


        // $client = $this->createclient();

    }



    public function createusersession($user)
    {



        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];



        redirect('checkouts/checkout');
    }











}





?>