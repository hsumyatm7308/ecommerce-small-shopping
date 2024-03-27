<?php

class Allfragrance extends Controller
{

    public $mainmodel;
    public $sidebarmodel;
    public $pagination;

    public function __construct()
    {
        $this->mainmodel = $this->model('All');
        $this->sidebarmodel = $this->model('Side');
        $this->pagination = new Pagination;

    }


    public function index()
    {




        $currenturl = $_SERVER['REQUEST_URI'];

        $urlparts = parse_url($currenturl);

        parse_str($urlparts['query'], $parameter);

        $page = isset ($parameter['page']) ? $parameter['page'] : 1;
        $itemsperpage = 8;
        $offset = ($page - 1) * $itemsperpage;

        $totalitems = $this->mainmodel->countItems();



        $totalPages = ceil($totalitems / $itemsperpage);


        $items = $this->mainmodel->items($offset, $itemsperpage);
        $types = $this->mainmodel->types();
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






    // public function sorting()
    // {
    //     $_POST = json_decode(file_get_contents('php://input'), true);
    //     $sortBy = $_POST['sortBy'];

    //     $this->mainmodel->getsoring($sortBy);
    // }












}


?>