<?php
ini_set('display_errors', 0);

class All
{

    private $db;
    public $currenturl;

    public $letter;

    public $page;

    public function __construct()
    {
        $this->db = new Database();

    }

    public function items($offset, $limit)
    {



        $this->currenturl = $_SERVER['REQUEST_URI'];

        $querystring = parse_url($this->currenturl);

        $page = explode('=', $querystring['query'])[0];

        echo $page;

        if ($page) {

            $this->letter = explode('=', $this->currenturl)[1];


            // echo $this->letter;

            if ($page == "letters") {




                // for price  if letters exit
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    $minprice = $_POST['minprice'];
                    $maxprice = $_POST['maxprice'];


                    $this->db->dbquery('SELECT * FROM items WHERE price BETWEEN :min AND :max AND name LIKE :name LIMIT :offset, :limit');
                    $this->db->dbbind(':min', $minprice);
                    $this->db->dbbind(':max', $maxprice);
                    $this->db->dbbind(':name', '%' . $this->letter . '%');
                    $this->db->dbbind(':offset', $offset);
                    $this->db->dbbind(':limit', $limit);




                } else {

                    // for brands letter 
                    $this->db->dbquery('SELECT * FROM items WHERE name LIKE :name LIMIT :offset, :limit');
                    $this->db->dbbind(':name', '%' . $this->letter . '%');
                    $this->db->dbbind(':offset', $offset);
                    $this->db->dbbind(':limit', $limit);
                }

                echo "yes letters";



            } else {

                // for price if letter not exist
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    $minprice = $_POST['minprice'];
                    $maxprice = $_POST['maxprice'];
                    $this->db->dbquery('SELECT * FROM items WHERE price  BETWEEN :min AND :max LIMIT :offset, :limit');
                    $this->db->dbbind(':min', $minprice);
                    $this->db->dbbind(':max', $maxprice);
                    $this->db->dbbind(':offset', $offset);
                    $this->db->dbbind(':limit', $limit);


                } else {

                    $this->db->dbquery('SELECT * FROM items LIMIT :offset, :limit');
                    $this->db->dbbind(':offset', $offset);
                    $this->db->dbbind(':limit', $limit);


                }


                echo "no letters";

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
    }






    public function types()
    {
        $this->db->dbquery('SELECT * FROM categories');
        return $this->db->getmultidata();
    }


    public function countItems()
    {
        $this->db->dbquery('SELECT COUNT(*) AS totalItems FROM items');
        return $this->db->getsingledata()['totalItems'];



        // $this->currenturl = $_SERVER['REQUEST_URI'];





        // $querystring = parse_url($this->currenturl);

        // $page = explode('=', $querystring['query'])[0];











    }




}


?>