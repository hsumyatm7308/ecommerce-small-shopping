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

    public function insertreply()
    {
        if (isset($_POST['replybtn']) && $_SERVER['REQUEST_METHOD'] === 'POST') {


            $name = $_POST['replyusername'];
            $replytext = $_POST['replytext'];
            $review_id = $_POST['review_id'];
            $item_id = $_POST['item_id'];
            $reply_id = $_POST['reply_id'] ? $_POST['reply_id'] : $review_id;
            $userid = $_SESSION['user_id'];
            $touser_name = $_POST['touser_name'] ? $_POST['touser_name'] : "";


            $this->db->dbquery('INSERT INTO `review_reply` (`replies`, `review_id`, `replyitem_id`, `reply_id`, `replyuser_id`, `touser_name`) VALUES (:replies, :review_id, :replyitem_id, :reply_id, :replyuser_id, :touser_name)');
            $this->db->dbbind(':replies', $replytext);
            $this->db->dbbind(':review_id', $review_id);
            $this->db->dbbind(':replyitem_id', $item_id);
            $this->db->dbbind(':reply_id', $reply_id);
            $this->db->dbbind(':replyuser_id', $userid);
            $this->db->dbbind(':touser_name', $touser_name);


            if ($this->db->dbexecute()) {
                // redirect('allfragrance/show/' . $item_id);

                return true;

            } else {
                return false;
            }


        }





    }

    // show review 
    public function showreview($id)
    {
        $this->db->dbquery('SELECT * FROM users u INNER JOIN reviews r ON r.user_id = u.id  WHERE item_id = :id');
        $this->db->dbbind(':id', $id);
        return $this->db->getmultidata();
    }



    public function replyreview($id)
    {
        $query = 'SELECT *
        FROM reviews r 
        LEFT JOIN review_reply rp ON r.id = rp.review_id  
        LEFT JOIN users u1 ON rp.replyuser_id = u1.id 
        WHERE rp.replyitem_id = :id';

        $this->db->dbquery($query);
        $this->db->dbbind(':id', $id);
        return $this->db->getmultidata();
    }







}
?>