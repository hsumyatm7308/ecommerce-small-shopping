<?php

class Vote
{


    private $db;



    public function __construct()
    {
        $this->db = new Database();



    }

    public function insertvoting()
    {

        if ($_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isset($_POST['primary_votebtn'])) {
                $voteid = $_POST['primary_voting_id'];
                $column = "review_id";
                $this->insert($voteid, $column);


            } elseif (isset($_POST['review_reply_btn'])) {
                $voteid = $_POST['review_reply_id'];
                $column = "review_reply_id";



                $this->insert($voteid, $column);
            }


        }



    }



    public function insert($voteid, $column)
    {
        $userid = $_SESSION['user_id'];
        if ($userid) {
            if (!$this->checkvote($voteid, $column)) {

                $this->db->dbquery("INSERT INTO votes ($column, user_id) VALUES(:review_id, :userid)");
                $this->db->dbbind(':review_id', $voteid);
                $this->db->dbbind(':userid', $userid);
                $this->db->dbexecute();


            } else {
                $this->db->dbquery("DELETE FROM votes WHERE $column = :revid AND user_id = :userid");
                $this->db->dbbind(':revid', $voteid);
                $this->db->dbbind(':userid', $userid);
                $this->db->dbexecute();

            }
        }





    }

    public function checkvote($voteid, $column)
    {
        $userid = $_SESSION['user_id'];
        $this->db->dbquery("SELECT * FROM votes WHERE $column = :revid AND user_id = :userid");
        $this->db->dbbind(':revid', $voteid);
        $this->db->dbbind(':userid', $userid);

        $row = $this->db->getsingledata();
        if ($row > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function countvote($voteid, $column)
    {
        $this->db->dbquery("SELECT COUNT(id) AS vote_count FROM votes WHERE $column = :revid");
        $this->db->dbbind(':revid', $voteid);

        $result = $this->db->getsingledata();
        return $result['vote_count'];
    }




}

?>