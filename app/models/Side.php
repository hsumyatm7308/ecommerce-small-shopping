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

            if ($curmethod === 'allfragrance') {
                $array = '(1,2,3)';
            } elseif ($curmethod === 'lotions') {
                $array = '(5,6)';
            } else {
                $array = '(7,8,9)';
            }
            return $array;
        };

        $this->db->dbquery('SELECT * FROM items WHERE category_id IN' . $curarray());

        return $this->db->getmultidata();
    }











}


?>