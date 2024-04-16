<?php

class Recommend
{
    private $db;
    public $currenturl;

    public $letter;

    public $pagination;

    public $filter;

    public $sortDirection = 'ASC';


    public function __construct()
    {
        $this->db = new Database();

        $this->pagination = new Pagination();


    }

    public function show_recommend_items($id, $name)
    {
        $this->db->dbquery('SELECT i.*,b.name As brandname FROM items i INNER JOIN brands b ON b.id = i.brand_id WHERE brand_id LIKE :id OR i.name LIKE :name ORDER BY RAND() LIMIT 4');
        $this->db->dbbind(':id', '%' . $id . '%');
        $this->db->dbbind(':name', '%' . $name . '%');
        return $this->db->getmultidata();

    }



}


?>