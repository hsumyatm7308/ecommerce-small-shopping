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
        $data = [
            'singledata' => $singledata
        ];
        $this->view('allfragrance/show', $data);

    }
}


?>