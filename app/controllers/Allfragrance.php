<?php

class Allfragrance extends Controller
{

    public $allmodal;
    public $sidebarmodal;
    public $pagination;

    public $reviewmodal;

    public function __construct()
    {
        $this->allmodal = $this->model('All');
        $this->sidebarmodal = $this->model('Side');
        $this->reviewmodal = $this->model('Review');
        $this->pagination = new Pagination;

    }


    public function index()
    {


        $getpage = $this->pagination->getparameter()['page'];
        $page = isset($getpage) ? $getpage : 1;

        $itemsperpage = 8;
        $offset = ($page - 1) * $itemsperpage;

        $totalitems = $this->allmodal->countItems();

        $totalPages = ceil($totalitems / $itemsperpage);


        $items = $this->allmodal->items($offset, $itemsperpage);
        $types = $this->allmodal->types();
        $sidebaritems = $this->sidebarmodal->sidebaritems();


        $minprice = $this->pagination->getparameter()['minprice'];
        $maxprice = $this->pagination->getparameter()['maxprice'];
        $userinfo = $this->allmodal->getuserinfo();


        $data = [
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
        $singledata = $this->allmodal->getsingleitem($id);
        $brand = $this->allmodal->getbrand($singledata['id']);
        $status = $this->allmodal->getstatus($singledata['status_id']);
        $authuser = $this->allmodal->getuserinfo();

        $allreviews = $this->reviewmodal->showreview($id);
        $replyreviews = $this->reviewmodal->replyreview($id);





        if (isset($_POST['addtocart'])) {
            if ($this->allmodal->shopcardlist()) {
                flash('added', 'Item added successfully');
            } else {
                flash('already_added', 'Item already added');

            }
        }


        $data = [
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


        ];

        // check review err 
        if (isset($_POST['reviewbtn'])) {
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

        $this->view('allfragrance/show', $data);
    }

}


?>