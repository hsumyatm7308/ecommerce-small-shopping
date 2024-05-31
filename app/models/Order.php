<?php

class Order
{


    private $db;

    public $curmethodmodal;


    public function __construct()
    {
        $this->db = new Database();


    }


    public function orders($userid, $guest_id)
    {
        $order_items = json_decode($_COOKIE['cart']);


        // var_dump($order_items); 

        $cart = new Cart();


        if (isset($_POST['complete_order'])) {

            // payment 


            if (!empty($order_items)) {
                foreach ($order_items as $item) {
                    $item_id = $item->cartorderid;
                    $price = $item->price;
                    $quantity = $item->oquantity;
                    $brand = $item->brand_cook_id;


                    if (!$cart->hasitem($item_id)) {
                        $this->db->dbquery('INSERT INTO orders (item_id, price, quantity, brand_id, user_id,guest_id) VALUES (:itemid, :price, :quantity, :brand, :user_id,:guest_id)');
                        $this->db->dbbind(':itemid', $item_id);
                        $this->db->dbbind(':price', $price);
                        $this->db->dbbind(':quantity', $quantity);
                        $this->db->dbbind(':brand', $brand);
                        $this->db->dbbind(':user_id', $userid);
                        $this->db->dbbind(':guest_id', $guest_id);

                        if ($this->db->dbexecute()) {
                            redirect('thankyous/thankyou');

                            return true;

                        } else {

                            return false;
                        }

                    } else {
                        redirect('thankyous/thankyou');

                    }
                }

                if (isset($_POST['addtocart_index'])) {
                    $curmethod = $this->curmethodmodal->getmethod();
                    redirect('allfragrance?page=1&' . $curmethod);
                }

                return true;
            } else {
                return false;
            }
        }

    }



}



?>