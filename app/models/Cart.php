<?php

class Cart
{


    private $db;




    public function __construct()
    {
        $this->db = new Database();

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




}

?>