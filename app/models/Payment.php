<?php

// require 'vendor/autoload.php';

class Payment
{

    private $db;

    public $curmethodmodal;


    public function __construct()
    {
        $this->db = new Database();


    }
    public function payment($userid, $guest_id)
    {
        $this->db->dbquery('INSERT INTO payments (method, user_id,guest_id) VALUES (:method,:user_id,:guest_id)');
        $this->db->dbbind(':method', $_POST['payment']);

        $this->db->dbbind(':user_id', $userid);
        $this->db->dbbind(':guest_id', $guest_id);
        if ($this->db->dbexecute()) {

            // redirect('checkouts/checkout');
            return true;

        } else {
            return false;
        }
    }

    public function paymentshow($guest_id)
    {
        $query = "SELECT method FROM payments WHERE 1=1";

        if (isset($_SESSION['user_id'])) {
            $query .= " AND user_id = :userid";
            $bindparams[':userid'] = $_SESSION['user_id'];
        }

        if ($guest_id) {
            $query .= " AND guest_id = :guest_id";
            $bindparams[':guest_id'] = $guest_id;
        }
        $query .= " ORDER BY id DESC LIMIT 1";

        $this->db->dbquery($query);
        foreach ($bindparams as $param => $value) {
            $this->db->dbbind($param, $value);
        }
        return $this->db->getsingledata();

    }
}
