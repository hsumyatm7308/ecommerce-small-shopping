<?php

class Cartsummarys extends Controller
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
    public $usermodal;


    public function __construct()
    {
        $this->cardmodal = $this->model('Cart');
        $this->navbarmodal = $this->model('Nav');
        $this->usermodal = $this->model('User');

    }


    public function index()
    {
        $orderitemcount = $this->navbarmodal->order_item_count();
        $cartitems = $this->cardmodal->cart_items_show();
        $showship = $this->cardmodal->selectshipcost();
        $userinfo = $this->usermodal->getuserinfo();

        $data = [
            'orderitemcount' => $orderitemcount,
            'cartitems' => $cartitems,
            'shipmethod' => $showship,
            'user' => $userinfo

        ];
        $this->view('cartsummarys/index', $data);
    }




    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->cardmodal->update();
            redirect('cartsummarys');
        }


    }

    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->cardmodal->destroy();
            redirect('cartsummarys');
        }


    }


    public function insertshipcost()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->cardmodal->insertshipcost();
            redirect('cartsummarys');
        }
    }
}


?>