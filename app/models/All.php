<?php
ini_set('display_errors', 0);

class All
{

    private $db;
    public $currenturl;

    public $letter;

    public function __construct()
    {
        $this->db = new Database();

    }

    public function items()
    {


        $this->currenturl = $_SERVER['REQUEST_URI'];
        $this->letter = explode('=', $this->currenturl)[1];

        if ($this->letter) {




            // for price  if letters exit
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $minprice = $_POST['minprice'];
                $maxprice = $_POST['maxprice'];


                $this->db->dbquery('SELECT * FROM items WHERE price BETWEEN :min AND :max AND name LIKE :name');
                $this->db->dbbind(':min', $minprice);
                $this->db->dbbind(':max', $maxprice);
                $this->db->dbbind(':name', '%' . $this->letter . '%');





            } else {

                // for brands letter 
                $this->db->dbquery('SELECT * FROM items WHERE name LIKE :name');
                $this->db->dbbind(':name', '%' . $this->letter . '%');

            }



        } else {

            // for price if letter not exist
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $minprice = $_POST['minprice'];
                $maxprice = $_POST['maxprice'];
                $this->db->dbquery('SELECT * FROM items WHERE price  BETWEEN :min AND :max');
                $this->db->dbbind(':min', $minprice);
                $this->db->dbbind(':max', $maxprice);



            } else {

                // for brands letter 
                $this->db->dbquery('SELECT * FROM items');
            }



        }



        // for types 
        $urlparts = parse_url($this->currenturl);

        if (isset($urlparts['query'])) {
            // Parse the query string into variables
            parse_str($urlparts['query'], $queryparameters);

            // Check if the 'types' parameter exists
            if (isset($queryparameters['types'])) {
                // echo $queryParameters['types'];


                $this->db->dbquery('SELECT * FROM items WHERE category_id = :category');
                $this->db->dbbind(':category', $queryparameters['types']);

            }
        }







        return $this->db->getmultidata();


    }










    public function types()
    {
        $this->db->dbquery('SELECT * FROM categories');
        return $this->db->getmultidata();
    }
}


?>