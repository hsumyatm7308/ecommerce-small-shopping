<?php

class Checkouts extends Controller
{
    use Google, ManualLogin, ManualRegister, Guest;
    public $pagination;
    public $navbarmodal;
    public $cardmodal;
    public $usermodel;
    public $ordermodel;
    public $shipaddressmodel;

    public $paymentmodel;

    public function __construct()
    {

        $this->cardmodal = $this->model('Cart');
        $this->navbarmodal = $this->model('Nav');
        $this->usermodel = $this->model('User');
        $this->ordermodel = $this->model('Order');
        $this->shipaddressmodel = $this->model('Shipaddress');
        $this->paymentmodel = $this->model('Payment');
        $this->pagination = new Pagination();

        require ('Googlelogin.php');

    }



    public function index()
    {
        $userinfo = $this->usermodel->getuserinfo();


        $cartitems = json_decode($_COOKIE['cart'], true);
        $showship = json_decode($_COOKIE['ship'], true);

        $shippingaddress = $this->shipaddressmodel->ship_address_show();


        $userid = $userinfo['id'];
        $guest_id = $this->usermodel->guest_user_info($_SESSION['guest_email'])['id'];

        // echo $guest_id;
        $this->ordermodel->orders($userid, $guest_id);



        $data = [
            'cartitems' => $cartitems,
            'shipmethod' => $showship[0],
            'user' => $userinfo,
            'shippingaddress' => $shippingaddress,


            "firstname" => trim($_POST['firstname']),
            "lastname" => trim($_POST['lastname']),
            "company" => trim($_POST['company']),
            "address" => trim($_POST['address']),
            "phone" => trim($_POST['phone']),
            "zip" => trim($_POST['zip']),
            "city" => trim($_POST['city']),
            "state_id" => trim($_POST['state_id']),
            "country_id" => trim($_POST['country_id']),
            "user_id" => $_SESSION['user_id'],

            'firstnameerr' => '',
            'lastnameerr' => '',
            'addresserr' => '',
            'ziperr' => '',
            'cityerr' => '',
            'state_iderr' => '',
            'country_iderr' => '',

            'payment' => $_POST['payment']


        ];





        $this->guest_email($data);
        $this->update_email($data);
        $this->shipping_address($data);
        $this->shipping_address_update($data);


        if (isset($_POST['payment'])) {
            $this->paymentmodel->payment($userid, $guest_id);

        }


        $this->view('checkouts/checkout', $data);
    }

    public function authcheck()
    {


        $cartitems = json_decode($_COOKIE['cart'], true);


        $data = [];

        $data = [
            'cartitems' => $cartitems,
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


    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->cardmodal->update();
            redirect('checkouts/checkout');
        }


    }


    public function destroy()
    {

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->cardmodal->destroy();
            redirect('checkouts/checkout');
        }


    }


    public function shipping_address($data)
    {

        if (isset($_POST['shipping_address_btn'])) {

            if (empty($data['firstname'])) {
                $data['firstnameerr'] = 'firstname is reqired';
            }


            if (empty($data['lastname'])) {
                $data['lastnameerr'] = 'lastname is reqired';
            }


            if (empty($data['address'])) {
                $data['addresserr'] = 'address is reqired';
            }


            if (empty($data['zip'])) {
                $data['ziperr'] = 'ziperr is reqired';
            }


            if (empty($data['city'])) {
                $data['cityerr'] = 'city is reqired';
            }


            if (empty($data['state_id'])) {
                $data['state_iderr'] = 'state is reqired';
            }


            if (empty($data['country_id'])) {
                $data['country_iderr'] = 'country is reqired';
            }

            if (!empty($data['firstname']) && !empty($data['lastname']) && !empty($data['address']) && !empty($data['zip']) && !empty($data['city'])) {
                // echo "all fill value";
                if ($this->shipaddressmodel->create_address($data)) {


                    $shipaddress = [
                        'shipaddress' => $this->shipaddressmodel->ship_address_show()
                    ];



                    createshipaddresssession($shipaddress);



                }

            } else {
                // echo "yes empty";
                $this->view('checkouts/checkout', $data);
            }




        }





    }


    public function shipping_address_update($data)
    {
        if (isset($_POST['shipping_address_update'])) {
            $this->shipaddressmodel->shipping_address_update($data);

            $shipaddress = [
                'shipaddress' => $this->shipaddressmodel->ship_address_show()
            ];

            createshipaddresssession($shipaddress);
        }
    }




}


trait ManualLogin
{
    public function manuallogin($data)
    {

        // $orderitemcount = $this->navbarmodal->order_item_count();
        // $cartitems = $this->cardmodal->cart_items_show();
        // $userinfo = $this->usermodel->getuserinfo();
        $cartitems = json_decode($_COOKIE['cart'], true);

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        $data = [
            // 'orderitemcount' => $orderitemcount,
            'cartitems' => $cartitems,
            // 'user' => $userinfo,

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
                redirect('checkouts/checkout');
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

                // $loginuser = [
                //     'fullname' => $data['fullname'],
                //     'email' => $data['email'],
                //     'password' => $data['password']
                // ];

                $loginuser = $this->usermodel->login($data['email'], $data['password']);

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
            $loginuser = $this->usermodel->login($data['email'], $data['password']);
            // var_dump($loginuser);

            if ($this->usermodel->registeremailcheck($data['email'])) {
                createusersession($loginuser);
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



// Guest  
trait Guest
{



    public function guest_email($data)
    {
        $userinfo = $this->usermodel->getuserinfo();

        $showship = json_decode($_COOKIE['ship'], true);

        $cartitems = json_decode($_COOKIE['cart'], true);

        $guestemail = $_POST['guest_email'];

        // create guest email

        if (isset($_POST['guest_email_btn'])) {
            if (!$this->usermodel->guest_email_check($guestemail)) {

                $this->usermodel->guest_email($guestemail);

                $data = [
                    'cartitems' => $cartitems,
                    'shipmethod' => $showship,
                    'ctn_btn' => true,
                ];

                $email = [
                    'guest_email' => $guestemail
                ];

                createusersession($email);

                $this->view('checkouts/checkout', $data);





            } else {
                $data = [
                    'cartitems' => $cartitems,
                    'shipmethod' => $showship,
                    'user' => $userinfo,
                    'email_exit' => 'email already exit'
                ];
                $this->view('checkouts/checkout', $data);

            }
        }




    }



    // update email 
    public function update_email($data)
    {
        // create update email 

        $oldemail = $_POST['upd_email_id'];

        $guestemail = $_POST['guest_email'];

        if (isset($_POST['upd_email'])) {

            $guestemail_db = $this->usermodel->guest_user_info($oldemail);

            $upd_data = [
                'id' => $guestemail_db['id'],
                'guest_email' => $guestemail
            ];

            $this->usermodel->guest_email_update($upd_data);

            createusersession($upd_data);


            $this->view('checkouts/checkout', $data);

        }


    }



    public function insertshipcost()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->cardmodal->insertshipcost();
            redirect('checkouts');
        }
    }
}


function createusersession($user)
{
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['fullname'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['guest_email'] = $user['guest_email'];


}

function createshipaddresssession($user)
{
    $_SESSION['shipaddress'] = $user['shipaddress'];
    // redirect('checkouts/checkout');
}




?>