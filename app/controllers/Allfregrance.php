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


        $items = $this->mainmodel->items();
        $types = $this->mainmodel->types();
        $sidebaritems = $this->sidebarmodel->sidebaritems();

        $data = [
            'title' => 'All',
            'items' => $items,
            'types' => $types,
            'sidebaritems' => $sidebaritems,

        ];



        $this->view('allfregrance/index', $data);




    }















}


?>