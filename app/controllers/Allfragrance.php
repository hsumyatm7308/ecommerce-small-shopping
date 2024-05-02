<?php

class Allfragrance extends Controller
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
        $this->allmodal = $this->model('All');
        $this->sidebarmodal = $this->model('Side');
        $this->reviewmodal = $this->model('Review');
        $this->votemodal = $this->model('Vote');
        $this->ratingmodal = $this->model('Rating');
        $this->recommendmodal = $this->model('Recommend');
        $this->navbarmodal = $this->model('Nav');
        $this->wishmodal = $this->model('Wish');
        $this->cardmodal = $this->model('Cart');

        $this->usermodal = $this->model('User');

        $this->pagination = new Pagination;
        $this->curitemidmodal = new Curitemid();

    }


    public function index()
    {


        $orderitemcount = $this->navbarmodal->order_item_count();
        $this->cardmodal->shopcardlist();
        $this->wishmodal->addtowish();


        $getpage = $this->pagination->getparameter()['page'];
        $page = isset($getpage) ? $getpage : 1;

        $itemsperpage = 12;
        $offset = ($page - 1) * $itemsperpage;

        $totalitems = $this->allmodal->countItems();

        $totalPages = ceil($totalitems / $itemsperpage);


        $items = $this->allmodal->items($offset, $itemsperpage);
        $types = $this->allmodal->types();





        $sidebaritems = $this->sidebarmodal->sidebaritems();


        $minprice = $this->pagination->getparameter()['minprice'];
        $maxprice = $this->pagination->getparameter()['maxprice'];
        $userinfo = $this->usermodal->getuserinfo();




        $data = [
            'orderitemcount' => $orderitemcount,

            'title' => 'All',
            'items' => $items,
            'types' => $types,
            'sidebaritems' => $sidebaritems,

            'currentPage' => $page,
            'totalPages' => $totalPages,
            'totalitems' => $totalitems,

            'minprice' => $minprice,
            'maxprice' => $maxprice,

            'user' => $userinfo
        ];



        $this->view('allfragrance/index', $data);
    }



    public function show($id)
    {



        $orderitemcount = $this->navbarmodal->order_item_count();



        $singledata = $this->allmodal->getsingleitem($id);
        $brand = $this->allmodal->getbrand($singledata['id']);
        $status = $this->allmodal->getstatus($singledata['status_id']);
        $authuser = $this->usermodal->getuserinfo();




        // review pagination 

        $getpage = isset($this->pagination->getparameter()['page']) ? $this->pagination->getparameter()['page'] : 1;
        $page = max(1, $getpage);

        $itemsperpage = 4;
        $offset = ($page - 1) * $itemsperpage;


        $totalreviews = $this->reviewmodal->reviewcount($id);
        $totalPages = ceil($totalreviews / $itemsperpage);

        $allreviews = $this->reviewmodal->showreview($id, $offset, $itemsperpage);


        $averagerating = $this->ratingmodal->average_rating();
        $rating_numbers = $this->ratingmodal->rating_number_count();


        $replyreviews = $this->reviewmodal->replyreview($id);


        // recommend 
        $showrecommenditems = $this->recommendmodal->show_recommend_items($singledata['brand_id'], $singledata['name']);


        //add to cart on show page

        if (isset($_POST['addtocart'])) {

            if ($this->cardmodal->shopcardlist()) {
                $redirect_url = 'allfragrance/show/' . $this->curitemidmodal->getitemid() . '?message=added';
                redirect($redirect_url);
            } else {
                $redirect_url = 'allfragrance/show/' . $this->curitemidmodal->getitemid() . '?message=already_added';
                redirect($redirect_url);
            }





        } elseif (isset($_POST['addtocart_index'])) {
            $single_recom_itemid = $_POST['single_recom_itemid'];
            if ($this->cardmodal->shopcardlist()) {
                $curmethod = $this->curitemidmodal->getmethod();

                $redirect_url = 'allfragrance/show/' . $single_recom_itemid . '&' . $curmethod;
                redirect($redirect_url);
            }
        }



        $data = [
            'orderitemcount' => $orderitemcount,


            'singledata' => $singledata,
            'brand' => $brand,
            'status' => $status,
            'user' => $authuser,
            'allreviews' => $allreviews,


            "replyreviews" => $replyreviews,



            // review modal 
            "review" => $_POST['userreview'],
            "email" => $_POST['useremail'],
            "username" => $_POST['username'],
            "rating" => $_POST['rating'],
            "itemid" => $_POST['itemid'],

            "errmessage" => "",
            "reviewerr" => "",
            "emailerr" => "",
            "usernameerr" => "",
            "ratingerr" => "",


            // rating 
            "averagerating" => $averagerating,
            "rating_numbers" => $rating_numbers,


            'currentPage' => $page,
            'totalPages' => $totalPages,
            'totalitems' => $totalreviews,

            'showrecommenditems' => $showrecommenditems


        ];

        // check review err 
        if (isset($_POST['reviewbtn']) || isset($_POST['editreviewbtn'])) {
            if (empty($data['review'])) {
                $data['errmessage'] = "required";
                $data['reviewerr'] = "required";
            }

            if (empty($data['email'])) {
                $data['errmessage'] = "required";
                $data['emailerr'] = "required";
            }

            if (empty($data['username'])) {
                $data['errmessage'] = "required";
                $data['usernameerr'] = "required";
            }

            if (empty($data['rating'])) {
                $data['errmessage'] = "required";
                $data['ratingerr'] = "required";
            }

            $this->reviewmodal->insertreview($data);

        }
        $this->reviewmodal->insertreply();
        $this->votemodal->insertvoting();
        $this->wishmodal->addtowish();




        $this->view('showproduct/show', $data);
    }


    public function destroy($id)
    {
        $this->reviewmodal->destroy($id);
        redirect('allfragrance/show/' . $id);
    }


}


?>