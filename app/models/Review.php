<?php

class Review
{

    private $db;
    public $currenturl;

    public $letter;

    public $pagination;

    public $filter;

    public $sortDirection;

    public $curitemid;

    public function __construct()
    {
        $this->db = new Database();

        $this->pagination = new Pagination();
        $this->curitemid = new Curitemid;


    }

    // insert review
    public function insertreview($data)
    {

        $userid = $_SESSION['user_id'];
        if (isset($userid) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $reviewid = $_POST['reviewid'];
            $review = $data['review'];
            $username = $data['username'];
            $email = $data['email'];
            $rating = $data['rating'];
            $itemid = $data['itemid'];

            if (isset($_POST['reviewbtn'])) {

                if (!empty($review) && !empty($username) && !empty($email) && !empty($rating)) {

                    $this->db->dbquery('INSERT INTO reviews (reviews,rating,user_id,item_id) VALUES(:review,:rating,:userid,:itemid)');
                    $this->db->dbbind(':review', $review);
                    $this->db->dbbind(':rating', $rating);
                    $this->db->dbbind(':userid', $userid);
                    $this->db->dbbind(':itemid', $itemid);
                    if ($this->db->dbexecute()) {
                        redirect('allfragrance/show/' . $itemid . '?page=1');
                    } else {
                        return false;
                    }
                }
            }

            if (isset($_POST['editreviewbtn'])) {

                if (!empty($review) && !empty($username) && !empty($email) && !empty($rating)) {

                    $this->db->dbquery('UPDATE reviews SET reviews = :review, rating = :rating WHERE id = :id');
                    $this->db->dbbind(':review', $review);
                    $this->db->dbbind(':rating', $rating);
                    $this->db->dbbind(':id', $reviewid);

                    if ($this->db->dbexecute()) {
                        redirect('allfragrance/show/' . $itemid . '?page=1');
                    } else {
                        return false;
                    }


                }




            }



        }





    }

    // insert reply 
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
                redirect('allfragrance/show/' . $item_id . '?page=1');

            } else {
                return false;


            }


        }


        if (isset($_POST['editsubmit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {


            $replytext = $_POST['replytext'];
            $review_id = $_POST['review_id'];
            $reply_id = $_POST['reply_id'] ? $_POST['reply_id'] : $review_id;

            $item_id = $this->curitemid->getitemid();

            $this->db->dbquery('UPDATE `review_reply` SET `replies` = :replies WHERE reviewreplyid = :id');
            $this->db->dbbind(':replies', $replytext);
            $this->db->dbbind(':id', $reply_id);



            if ($this->db->dbexecute()) {
                redirect('allfragrance/show/' . $item_id . '?page=1');
            } else {
                return false;


            }


        }






    }

    // show review 
    public function showreview($id, $offset, $limit)
    {
        $this->db->dbquery('SELECT * FROM users u LEFT JOIN reviews r ON r.user_id = u.id WHERE item_id = :id LIMIT :offset, :limit');
        $this->db->dbbind(':id', $id);
        $this->db->dbbind(':offset', $offset, PDO::PARAM_INT);
        $this->db->dbbind(':limit', $limit, PDO::PARAM_INT);
        return $this->db->getmultidata();
    }

    public function reviewcount($id)
    {
        $this->db->dbquery('SELECT COUNT(*) AS total_reviews FROM reviews WHERE item_id = :id');
        $this->db->dbbind(':id', $id);
        $result = $this->db->getsingledata();
        return $result['total_reviews'];
    }



    // show reply 
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

    public function countreply($revieid)
    {


        $this->db->dbquery('SELECT COUNT(review_id) AS countrp FROM review_reply WHERE review_id = :repid');
        $this->db->dbbind(':repid', $revieid);
        $row = $this->db->getsingledata();

        $countrp = $row['countrp'] ? $row['countrp'] : 0;
        return $countrp;

    }



    public function countreviewreply($revieid)
    {
        $this->db->dbquery('SELECT COUNT(reply_id) AS countrp FROM review_reply WHERE reply_id = :repid');
        $this->db->dbbind(':repid', $revieid);
        $row = $this->db->getsingledata();

        $countrp = $row['countrp'] ? $row['countrp'] : 0;
        return $countrp;

    }


    // delete review
    public function destroy($id)
    {

        if (isset($_POST['deletemodal_btn']) && $_SERVER['REQUEST_METHOD'] === "POST") {
            $table = $_POST['datatable'];
            $data_id_name = $_POST['data_id_name'];

            $deleteid = $_POST['delete_id'];
            $this->db->dbquery("DELETE FROM $table WHERE $data_id_name = :id");
            $this->db->dbbind(':id', $deleteid);
            $this->db->dbexecute();
        }

    }



}
?>