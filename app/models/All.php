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
        // $letter = $this->pagination->getparameter()['letters'];


        $this->currenturl = $_SERVER['REQUEST_URI'];
        $urlparts = parse_url($this->currenturl);
        parse_str($urlparts['query'], $queryparameters);

        $letter = $queryparameters['letters'];




        $min = $this->pagination->getparameter()['minprice'];
        $max = $this->pagination->getparameter()['maxprice'];


        if ($page) {

            // letters 
            if ($page == "letters") {
                // for price  if letters exit
                // if ($min && $max && $letter) {
                //     $this->db->dbquery('SELECT * FROM items WHERE price BETWEEN :min AND :max AND name LIKE :name LIMIT :offset, :limit');
                //     $this->db->dbbind(':min', $min);
                //     $this->db->dbbind(':max', $max);
                //     $this->db->dbbind(':name', '%' . $letter . '%');
                //     $this->db->dbbind(':offset', $offset);
                //     $this->db->dbbind(':limit', $limit);

                //     echo "yes letter";

                // } else {

                // for brands letter 
                $this->db->dbquery('SELECT * FROM items WHERE name LIKE :name LIMIT :offset, :limit');
                $this->db->dbbind(':name', '%' . $letter . '%');
                $this->db->dbbind(':offset', $offset);
                $this->db->dbbind(':limit', $limit);

                //     echo "yes letter no price";

                // }


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

                    // if ($min && $max) {


                    //     $this->db->dbquery('SELECT * FROM items WHERE price BETWEEN :min AND :max AND category_id = :category LIMIT :offset, :limit');
                    //     $this->db->dbbind(':min', $min);
                    //     $this->db->dbbind(':max', $max);
                    //     $this->db->dbbind(':category', $types);

                    //     $this->db->dbbind(':offset', $offset);
                    //     $this->db->dbbind(':limit', $limit);

                    //     // echo "yes" . $types;
                    // } else {

                    $this->db->dbquery('SELECT * FROM items WHERE category_id = :category LIMIT :offset, :limit');
                    $this->db->dbbind(':category', $types);
                    $this->db->dbbind(':offset', $offset);
                    $this->db->dbbind(':limit', $limit);

                    // echo "no";
                    // }

                }

                // end types 
            }
            //  end letters 

            return $this->db->getmultidata();

        }
    }








    public function types()
    {
        $this->db->dbquery('SELECT * FROM categories');
        return $this->db->getmultidata();
    }


    public function countItems()
    {
        $page = $this->pagination->getpage();
        $letter = $this->pagination->getparameter()['letters'];
        $min = $this->pagination->getparameter()['minprice'];
        $max = $this->pagination->getparameter()['maxprice'];



        if ($page) {

            if ($page == "letters") {

                // for price  if letters exit
                if ($min & $max & $letter) {
                    $this->db->dbquery('SELECT COUNT(*) AS totalItems  FROM items WHERE price BETWEEN :min AND :max AND name LIKE :name');
                    $this->db->dbbind(':min', $min);
                    $this->db->dbbind(':max', $max);
                    $this->db->dbbind(':name', '%' . $letter . '%');
                } else {
                    // for brands letter 
                    $this->db->dbquery('SELECT COUNT(*) AS totalItems  FROM items WHERE name LIKE :name');
                    $this->db->dbbind(':name', '%' . $letter . '%');
                }

                // echo "yes letters";
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