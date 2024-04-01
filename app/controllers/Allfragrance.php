<?php

class Allfragrance extends Controller
{

    public $allmodel;
    public $sidebarmodel;
    public $pagination;

    public function __construct()
    {
        $this->allmodel = $this->model('All');
        $this->sidebarmodel = $this->model('Side');
        $this->pagination = new Pagination;

    }


    public function index()
    {


        $getpage = $this->pagination->getparameter()['page'];
        $page = isset($getpage) ? $getpage : 1;

        $itemsperpage = 8;
        $offset = ($page - 1) * $itemsperpage;

        $totalitems = $this->allmodel->countItems();

        $totalPages = ceil($totalitems / $itemsperpage);


        $items = $this->allmodel->items($offset, $itemsperpage);
        $types = $this->allmodel->types();
        $sidebaritems = $this->sidebarmodel->sidebaritems();


        $minprice = $this->pagination->getparameter()['minprice'];
        $maxprice = $this->pagination->getparameter()['maxprice'];


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
        ];


        $this->view('allfragrance/index', $data);
    }



    public function show($id)
    {
        $singledata = $this->allmodel->getsingleitem($id);
        $brand = $this->allmodel->getbrand($singledata['id']);
        $status = $this->allmodel->getstatus($singledata['status_id']);
        $userinfo = $this->allmodel->getuserinfo();










        if (isset($_POST['addtocart'])) {
            if ($this->allmodel->shopcardlist()) {
                flash('added', 'Item added successfully');
            } else {
                flash('already_added', 'Item already added');

            }
        }


        $data = [
            'singledata' => $singledata,
            'brand' => $brand,
            'status' => $status,
            'user' => $userinfo,
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

            $this->allmodel->insertreview($data);
        }




        $this->view('allfragrance/show', $data);



    }
}


?>