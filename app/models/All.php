<?php
ini_set('display_errors', 0);

class All
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

    public function items($offset, $limit)
    {



        $sorting = function () {

            $sortby = $this->pagination->getparameter()['sortby'];

            if ($sortby == "price_asc") {
                $sortDirection = 'ASC';
            } elseif ($sortby == "price_desc") {
                $sortDirection = 'DESC';
            } else {
                $sortDirection = '';
            }


            return $sortDirection;
        };


        $letter = $this->pagination->getparameter()['letter'];


        $min = $this->pagination->getparameter()['minprice'];
        $max = $this->pagination->getparameter()['maxprice'];

        $types = $this->pagination->getparameter()['types'];

        $sortdirection = $sorting();


        $query = 'SELECT * FROM items WHERE 1=1';
        $bindparams = [];

        if (isset($types)) {
            $query .= ' AND category_id = :category';
            $bindparams[':category'] = $types;

            echo "types";
        }


        if (isset($min) && isset($max)) {
            $query .= ' AND price BETWEEN :min AND :max';
            $bindparams[':min'] = $min;
            $bindparams[':max'] = $max;

            echo "min";
        }

        if (isset($letter)) {
            $query .= ' AND name LIKE :name';
            $bindparams[':name'] = '%' . $letter . '%';

            echo "letter";
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






}


?>