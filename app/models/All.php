<?php

class All
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();

    }

    public function items($letters = null)
    {
        if ($letters) {

            $first = $letters;

            $this->db->dbquery('SELECT * FROM items WHERE name LIKE :name');
            $this->db->dbbind(':name', '%' . $first . '%');

            echo "yes";
        } else {
            $this->db->dbquery('SELECT * FROM items');

            echo "no";
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