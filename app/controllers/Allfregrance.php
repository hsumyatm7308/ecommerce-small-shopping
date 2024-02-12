<?php

class Allfregrance extends Controller
{

    public $mainmodel;

    public function __construct()
    {
        $this->mainmodel = $this->model('All');
    }


    public function index()
    {


        $letters = isset($_POST['letters']) ? $_POST['letters'] : null;

        echo $letters;



        $items = $this->mainmodel->items($letters);
        $types = $this->mainmodel->types();

        $data = [
            'title' => 'All',
            'items' => $items,
            'types' => $types
        ];

        $this->view('allfregrance/index', $data);

        // Continue with the rest of your code



    }












}


?>