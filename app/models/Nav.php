<?php
ini_set('display_errors', 0);

class Nav
{

    private $db;



    public function __construct()
    {
        $this->db = new Database();



    }

    public function order_item_count()
    {
        $userid = $_SESSION['user_id'];

        $this->db->dbquery('SELECT COUNT(id) AS countrp FROM orders WHERE user_id = :userid');
        $this->db->dbbind(':userid', $userid);
        $row = $this->db->getsingledata();

        $countrp = $row['countrp'] ? $row['countrp'] : 0;
        return $countrp;


    }



}


?>