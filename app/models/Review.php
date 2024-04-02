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

            $userid = $_SESSION['user_id'];

            $name = $_POST['replyusername'];

            $replytext = $_POST['replytext'];

            $reply_id = $_POST['reply_id'];

            $item_id = $_POST['item_id'];


            $this->db->dbquery('INSERT INTO reviews (reviews,user_id,item_id,reply_id) VALUES(:review,:userid,:itemid,:replyid)');
            $this->db->dbbind(':review', $replytext);
            $this->db->dbbind(':userid', $userid);
            $this->db->dbbind(':itemid', $item_id);
            $this->db->dbbind(':replyid', $reply_id);

            // $this->db->dbexecute();

            if ($this->db->dbexecute()) {
                redirect('allfragrance/show/' . $item_id);
                echo "execute";
                echo $replytext, $reply_id, $item_id;

            } else {
                echo "no execute";
            }


        }
    }

    // show review 
    public function showreview($id)
    {

        $this->db->dbquery('SELECT * FROM users u INNER JOIN reviews r ON r.user_id = u.id  WHERE item_id = :id AND reply_id is NULL');

        $this->db->dbbind(':id', $id);
        return $this->db->getmultidata();
    }



    public function replyreview($id)
    {
        $geturl = $_GET['url'];

        $url_parts = explode('/', $geturl);

        $item_id = end($url_parts);

        echo $item_id;
        $allreviews = $this->showreview($id);

        foreach ($allreviews as $allreview) {
            $reply_id = $allreview['id'];
        }


        echo $reply_id;
        // 

        $this->db->dbquery('SELECT * FROM reviews WHERE item_id = :id AND  reply_id is NOT NULL');
        $this->db->dbbind(':id', $id);
        // $this->db->dbbind(':repid', $reply_id);
        return $this->db->getmultidata();

    }





}
?>