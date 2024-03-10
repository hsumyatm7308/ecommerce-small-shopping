<?php
ini_set('display_errors', 0);

class All
{

    private $db;
    public $currenturl;

    public $letter;

    public $pagination;

    public function __construct()
    {
        $this->db = new Database();

        $this->pagination = new Pagination();

    }

    public function items($offset, $limit)
    {
        $page = $this->pagination->getpage();
        $letter = $this->pagination->getparameter()['letter'];





        $min = $this->pagination->getparameter()['minprice'];
        $max = $this->pagination->getparameter()['maxprice'];



        if ($page) {

            // letters 
            if ($letter) {

                // for brands letter 
                $this->db->dbquery('SELECT * FROM items WHERE name LIKE :name LIMIT :offset, :limit');
                $this->db->dbbind(':name', '%' . $letter . '%');
                $this->db->dbbind(':offset', $offset);
                $this->db->dbbind(':limit', $limit);

            } else {
                // echo "no types and no leeter";

                // for price if letter not exist and if types not exist 
                if ($min && $max) {
                    $this->db->dbquery('SELECT * FROM items WHERE price  BETWEEN :min AND :max LIMIT :offset, :limit');
                    $this->db->dbbind(':min', $min);
                    $this->db->dbbind(':max', $max);
                    $this->db->dbbind(':offset', $offset);
                    $this->db->dbbind(':limit', $limit);
                } else {
                    $this->db->dbquery('SELECT * FROM items LIMIT :offset, :limit');
                    $this->db->dbbind(':offset', $offset);
                    $this->db->dbbind(':limit', $limit);
                }



                // for types 

                $types = $this->pagination->getparameter()['types'];

                if ($types) {

                    $this->db->dbquery('SELECT * FROM items WHERE category_id = :category LIMIT :offset, :limit');
                    $this->db->dbbind(':category', $types);
                    $this->db->dbbind(':offset', $offset);
                    $this->db->dbbind(':limit', $limit);

                }

                // end types 
            }
            //  end letters 

            return $this->db->getmultidata();

        }
    }








    public function types()
    {
        $this->db->dbquery('SELECT * FROM categories WHERE id IN (1,2,3)');
        return $this->db->getmultidata();
    }


    public function countItems()
    {
        $page = $this->pagination->getpage();
        $letter = $this->pagination->getparameter()['letter'];
        $min = $this->pagination->getparameter()['minprice'];
        $max = $this->pagination->getparameter()['maxprice'];

        // var_dump($letter . "let");



        if ($page) {

            if ($page == "letter") {

                // for brands letter 
                $this->db->dbquery('SELECT COUNT(*) AS totalItems  FROM items WHERE name LIKE :name');
                $this->db->dbbind(':name', '%' . $letter . '%');

            } else {

                // for price if letter not exist
                if ($min & $max) {
                    $this->db->dbquery('SELECT COUNT(*) AS totalItems  FROM items WHERE price  BETWEEN :min AND :max');
                    $this->db->dbbind(':min', $min);
                    $this->db->dbbind(':max', $max);
                } else {
                    $this->db->dbquery('SELECT COUNT(*) AS totalItems  FROM items');
                }
                // echo "no letters";


                // for types 

                $types = $this->pagination->getparameter()['types'];

                if ($types) {
                    $this->db->dbquery('SELECT COUNT(*) AS totalItems  FROM items WHERE category_id = :category');
                    $this->db->dbbind(':category', $types);
                }
            }

            return $this->db->getsingledata()['totalItems'];

        }

    }

}


?>