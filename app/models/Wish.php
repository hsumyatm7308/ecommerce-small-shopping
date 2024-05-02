<?php

class Wish
{


    private $db;

    public $curitemid;



    public function __construct()
    {
        $this->db = new Database();
        $this->curitemid = new Curitemid;



    }
    public function addtowish()
    {
        $userid = $_SESSION['user_id'];

        if (isset($_POST['addtowish']) || isset($_POST['addtowish_index']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

            $itemid = $_POST['addtowish_itemid'];

            if (!empty($userid)) {


                if (!$this->hasitem($itemid)) {

                    $this->db->dbquery('INSERT INTO wishes (item_id, user_id) VALUES (:itemid,:user_id)');
                    $this->db->dbbind(':itemid', $itemid);

                    $this->db->dbbind(':user_id', $userid);

                    if ($this->db->dbexecute()) {
                        if (isset($_POST['addtowish_index'])) {
                            $curmethod = $this->curitemid->getmethod();

                            redirect('allfragrance?page=1&' . $curmethod);
                        }
                        return true;


                    } else {
                        return false;
                    }

                }
            } else {
                redirect('users/login');
            }


        }
    }

    // check item exit or not 
    public function hasitem($itemid)
    {
        $userid = $_SESSION['user_id'];

        $this->db->dbquery('SELECT item_id FROM wishes WHERE item_id = :itemid AND user_id = :user_id');
        $this->db->dbbind(':itemid', $itemid);
        $this->db->dbbind(':user_id', $userid);


        $this->db->getsingledata();

        if ($this->db->getsingledata() > 0) {
            return true;
        } else {
            return false;
        }



    }




}

?>