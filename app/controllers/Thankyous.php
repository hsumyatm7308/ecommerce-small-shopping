<?php

class Thankyous extends Controller
{

    public $pagination;
    public $navbarmodal;
    public $cardmodal;
    public $usermodel;
    public $ordermodel;
    public $shipaddressmodel;

    public function __construct()
    {


        $this->cardmodal = $this->model('Cart');
        $this->navbarmodal = $this->model('Nav');
        $this->usermodel = $this->model('User');
        $this->ordermodel = $this->model('Order');
        $this->shipaddressmodel = $this->model('Shipaddress');
        $this->pagination = new Pagination();

        require ('Googlelogin.php');

    }

    public function index()
    {

        $this->view('thankyous/thankyou');
    }


}

?>