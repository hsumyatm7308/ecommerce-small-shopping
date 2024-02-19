<?php

class All
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();

    }

    public function items()
    {


        $currenturl = $_SERVER['REQUEST_URI'];

        $part = explode('=', $currenturl)[1];

        print_r($part);

        if ($part) {

            $this->db->dbquery('SELECT * FROM items WHERE name LIKE :name');
            $this->db->dbbind(':name', '%' . $part . '%');

        } else {
            echo "no";
            $this->db->dbquery('SELECT * FROM items');

        }



        return $this->db->getmultidata();
    }










    public function types()
    {
        $this->db->dbquery('SELECT * FROM categories');
        return $this->db->getmultidata();
    }
}


?>