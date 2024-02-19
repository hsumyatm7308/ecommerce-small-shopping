<?php

class Side
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
        // echo "connect";

    }

    public function sidebaritems()
    {



        $this->db->dbquery('SELECT * FROM items');

        return $this->db->getmultidata();
    }











}


?>