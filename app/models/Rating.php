<?php

class Rating
{

    private $db;
    public $pagination;
    public $curitemid;

    public function __construct()
    {
        $this->db = new Database();

        $this->pagination = new Pagination;
        $this->curitemid = new Curitemid;


    }




    public function select_all_raing_count()
    {
        $this->db->dbquery('SELECT COUNT(rating) as count FROM reviews');
        $result = $this->db->getmultidata();
        return $result[0]['count'];

    }

    public function selectallraing()
    {

        $item_id = $this->curitemid->getitemid();



        $this->db->dbquery('SELECT rating FROM reviews WHERE item_id = :itemid');
        $this->db->dbbind(':itemid', $item_id);

        $ratings = $this->db->getmultidata();

        return $ratings;
    }


    public function average_rating()
    {
        $total = $this->select_all_raing_count();
        if ($total === 0) {
            return 0; // no rating
        }

        $ratings = $this->selectallraing();
        $sum = 0;

        foreach ($ratings as $rating) {
            $sum += $rating['rating'];
        }

        $averagerating = $sum / $total;
        return number_format($averagerating, 1);
    }


    public function rating_number_count()
    {

        $item_id = $this->curitemid->getitemid();


        $this->db->dbquery("SELECT * FROM reviews WHERE item_id = :itemid");
        $this->db->dbbind(':itemid', $item_id);


        $ratings = $this->db->getmultidata();

        return $ratings;
    }




}


?>