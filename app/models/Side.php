<?php

class Side
{

    private $db;

    public $curmethodmodal;
    public function __construct()
    {
        $this->db = new Database();
        $this->curmethodmodal = new Curitemid();

    }

    public function sidebaritems()
    {



        $curarray = function () {
            $curmethod = $this->curmethodmodal->getmethod();

            $curmethod = explode('?', $curmethod)[0];
            if ($curmethod === 'all') {
                $array = '(1,2,3)';
            } elseif ($curmethod === 'lotions') {
                $array = '(5,6)';
            } elseif ($curmethod === 'cosmetics') {
                $array = '(7,8,9)';
            } elseif ($curmethod === 'search') {
                $array = '(1,2,3,4,5,6,7,8)';
            }
            return $array;
        };

        $this->db->dbquery('SELECT * FROM items WHERE category_id IN' . $curarray());

        return $this->db->getmultidata();
    }











}


?>