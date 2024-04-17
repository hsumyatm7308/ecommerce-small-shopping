<?php
ini_set('display_errors', 0);

class All
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

    public function items($offset, $limit)
    {



        $sorting = function () {

            $sortby = $this->pagination->getparameter()['sortby'];

            if ($sortby == "price_asc") {
                $sortDirection = 'ASC';
            } elseif ($sortby == "price_desc") {
                $sortDirection = 'DESC';
            } elseif ($sortby == 'random') {
                $sortDirection = '';
            }


            return $sortDirection;
        };


        $letter = $this->pagination->getparameter()['letter'];



        $min = $this->pagination->getparameter()['minprice'];
        $max = $this->pagination->getparameter()['maxprice'];

        $types = $this->pagination->getparameter()['types'];

        $sortdirection = $sorting();


        $query = 'SELECT i.*, b.name AS brandname FROM items i INNER JOIN brands b ON b.id = i.brand_id WHERE 1=1';
        $bindparams = [];



        if (isset($types)) {
            $query .= ' AND category_id = :category';
            $bindparams[':category'] = $types;



        }


        if (isset($min) && isset($max)) {
            $query .= ' AND price BETWEEN :min AND :max';
            $bindparams[':min'] = $min;
            $bindparams[':max'] = $max;

        }

        if (isset($letter)) {
            $query .= ' AND i.name LIKE :item_name';
            $bindparams[':item_name'] = '%' . $letter . '%';

        }

        if (isset($sortdirection)) {
            $query .= ' ORDER BY price ' . $sortdirection;
        }

        if (isset($offset) && isset($limit)) {
            $query .= ' LIMIT :offset, :limit';
            $bindparams[':offset'] = $offset;
            $bindparams[':limit'] = $limit;
        }

        $this->db->dbquery($query);
        foreach ($bindparams as $param => $value) {
            $this->db->dbbind($param, $value);
        }
        return $this->db->getmultidata();



    }


    public function types()
    {
        $this->db->dbquery('SELECT * FROM categories WHERE id IN (1,2,3)');
        return $this->db->getmultidata();
    }


    public function countItems()
    {
        $letter = $this->pagination->getparameter()['letter'];
        $min = $this->pagination->getparameter()['minprice'];
        $max = $this->pagination->getparameter()['maxprice'];
        $types = $this->pagination->getparameter()['types'];

        $query = 'SELECT COUNT(*) AS totalItems FROM items WHERE 1 = 1';
        $bindParams = [];

        if (isset($types)) {
            $query .= ' AND category_id = :category';
            $bindParams[':category'] = $types;
        }

        if (isset($min) && isset($max)) {
            $query .= ' AND price BETWEEN :min AND :max';
            $bindParams[':min'] = $min;
            $bindParams[':max'] = $max;
        }

        if (isset($letter)) {
            $query .= ' AND name LIKE :name';
            $bindParams[':name'] = '%' . $letter . '%';
        }

        $this->db->dbquery($query);
        foreach ($bindParams as $param => $value) {
            $this->db->dbbind($param, $value);
        }

        return $this->db->getsingledata()['totalItems'];
    }



    //show each item
    public function getsingleitem($id)
    {

        $this->db->dbquery('SELECT * FROM items WHERE id = :id');
        $this->db->dbbind(':id', $id);

        return $this->db->getsingledata();

    }


    public function getbrand($id)
    {
        $this->db->dbquery('SELECT b.* FROM items i JOIN brands b ON i.brand_id = b.id WHERE i.id = :id');
        $this->db->dbbind(':id', $id);
        return $this->db->getsingledata();
    }



    public function getstatus($id)
    {

        $this->db->dbquery('SELECT * FROM `status` WHERE id = :id');
        $this->db->dbbind(':id', $id);
        return $this->db->getsingledata();


    }



    // add to cart  
    public function shopcardlist()
    {
        if (isset($_POST['addtocart']) || isset($_POST['addtocart_index']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['singlename'];
            $brand = $_POST['singlebrand'];
            $price = $_POST['singleprice'];
            $quantity = $_POST['singlequantity'];
            $userid = $_SESSION['user_id'];

            if (!$this->hasitem($name)) {

                $this->db->dbquery('INSERT INTO orders (name, price, quantity, brand_id, user_id) VALUES (:name, :price, :quantity, :brand, :user_id)');
                $this->db->dbbind(':name', $name);
                $this->db->dbbind(':price', $price);
                $this->db->dbbind(':quantity', $quantity);
                $this->db->dbbind(':brand', $brand);
                $this->db->dbbind(':user_id', $userid);

                if ($this->db->dbexecute()) {
                    if (isset($_POST['addtocart_index'])) {
                        redirect('allfragrance?page=1');
                    }
                    return true;


                } else {
                    return false;
                }

            }




        }
    }

    // check item exit or not 
    public function hasitem($name)
    {
        $userid = $_SESSION['user_id'];

        $this->db->dbquery('SELECT name FROM orders WHERE name = :name AND user_id = :user_id');
        $this->db->dbbind(':name', $name);
        $this->db->dbbind(':user_id', $userid);


        $this->db->getsingledata();

        if ($this->db->getsingledata() > 0) {
            return true;
        } else {
            return false;
        }



    }



    public function getuserinfo()
    {
        $userid = $_SESSION['user_id'];

        $this->db->dbquery('SELECT * FROM users WHERE id = :id');
        $this->db->dbbind(':id', $userid);
        return $this->db->getsingledata();
    }











}


?>