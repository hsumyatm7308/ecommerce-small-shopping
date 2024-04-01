<?php

class Review
{

    private $db;
    public $currenturl;

    public $letter;

    public $pagination;

    public $filter;

    public $sortDirection;


    public function __construct()
    {
        $this->db = new Database();

        $this->pagination = new Pagination();


    }
    public function insertreview($data)
    {

        $userid = $_SESSION['user_id'];
        if ($userid) {

            if (isset($_POST['reviewbtn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
                $review = $data['review'];
                $username = $data['username'];
                $email = $data['email'];
                $rating = $data['rating'];
                $itemid = $data['itemid'];


                if (!empty($review) && !empty($username) && !empty($email) && !empty($rating)) {

                    $this->db->dbquery('INSERT INTO reviews (reviews,rating,user_id,item_id) VALUES(:review,:rating,:userid,:itemid)');
                    $this->db->dbbind(':review', $review);
                    $this->db->dbbind(':rating', $rating);
                    $this->db->dbbind(':userid', $userid);
                    $this->db->dbbind(':itemid', $itemid);
                    if ($this->db->dbexecute()) {
                        redirect('allfragrance/show/' . $itemid);
                    } else {
                        return false;
                    }


                }

            }
        }

    }


    // show review 
    public function showreview($id)
    {
        $this->db->dbquery('SELECT * FROM reviews WHERE item_id = :id');
        $this->db->dbbind(':id', $id);
        return $this->db->getmultidata();
    }
}
?>