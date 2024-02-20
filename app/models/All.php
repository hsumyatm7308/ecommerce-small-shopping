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

            // for price 
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $minprice = $_POST['minprice'];
                $maxprice = $_POST['maxprice'];
                $this->db->dbquery('SELECT * FROM items WHERE name LIKE :name AND price BETWEEN :min AND :max');
                $this->db->dbbind(':min', $minprice);
                $this->db->dbbind(':max', $maxprice);



                if ($this->db->rowcount() === 0) {
                    die('No Data Found');
                }


            } else {

                // for brands letter 
                $this->db->dbquery('SELECT * FROM items WHERE name LIKE :name');

            }

            $this->db->dbbind(':name', '%' . $this->letter . '%');


        } else {

            // for price 
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



        if (isset($_POST['types'])) {
            $types = $_POST['types'];

            $typesstring = implode(', ', $types);


            // echo $typesstring;

            $this->db->dbquery('SELECT * FROM items WHERE category_id = :category');
            $this->db->dbbind(':category', $typesstring);





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