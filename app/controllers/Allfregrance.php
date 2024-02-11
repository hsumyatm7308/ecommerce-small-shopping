<?php

class Allfregrance extends Controller
{


    public function __construct()
    {
        $this->mainmodel = $this->model('All');
    }


    public function index()
    {

        $data = [
            'title' => 'All',
        ];

        $this->view('allfregrance/index', $data);
    }


}




?>