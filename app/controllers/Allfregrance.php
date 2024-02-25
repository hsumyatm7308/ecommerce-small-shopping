<?php

class Allfregrance extends Controller
{

    public $mainmodel;
    public $sidebarmodel;

    public function __construct()
    {
        $this->mainmodel = $this->model('All');
        $this->sidebarmodel = $this->model('Side');

    }


    public function index()
    {

        $currenturl = $_SERVER['REQUEST_URI'];

        $urlparts = parse_url($currenturl);

        parse_str($urlparts['query'], $parameter);

        $page = isset($parameter['page']) ? $parameter['page'] : 1;
        $itemsPerPage = 4;
        $offset = ($page - 1) * $itemsPerPage;

        $totalItems = $this->mainmodel->countItems();

        echo $totalItems;


        $totalPages = ceil($totalItems / $itemsPerPage);

        $items = $this->mainmodel->items($offset, $itemsPerPage);





        $types = $this->mainmodel->types();
        $sidebaritems = $this->sidebarmodel->sidebaritems();

        $data = [
            'title' => 'All',
            'items' => $items,
            'types' => $types,
            'sidebaritems' => $sidebaritems,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ];


        $this->view('allfregrance/index', $data);
    }
















}


?>