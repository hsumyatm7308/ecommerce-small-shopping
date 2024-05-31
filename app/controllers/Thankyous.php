<?php

class Thankyous extends Controller
{

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
        $cartitems = json_decode($_COOKIE['cart'], true);
        $showship = json_decode($_COOKIE['ship'], true);

        $shippingaddress = $this->shipaddressmodel->ship_address_show();


        $guest_id = $this->usermodel->guest_user_info($_SESSION['guest_email'])['id'];
        $paymethod = $this->paymentmodel->paymentshow($guest_id);


        $data = [
            'cartitems' => $cartitems,
            'shipmethod' => $showship[0],
            'shippingaddress' => $shippingaddress,
            'paymethod' => $paymethod

        ];


        $this->view('thankyous/thankyou', $data);
    }


}

?>