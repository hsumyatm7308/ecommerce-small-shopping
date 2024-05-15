<?php

class Cart
{


    private $db;

    public $curmethodmodal;


    public function __construct()
    {
        $this->db = new Database();

        $this->curmethodmodal = new Curitemid();




    }
    // add to cart  
    public function shopcardlist()
    {



        if (isset($_POST['addtocart']) || isset($_POST['addtocart_index']) && $_SERVER['REQUEST_METHOD'] === 'POST') {


            $item_id = $_POST['singleid'];
            $brand = $_POST['singlebrand'];
            $price = $_POST['singleprice'];
            $quantity = $_POST['singlequantity'];
            $userid = $_SESSION['user_id'];




            $data = [
                'itemimage' => $_POST['single_ck_img'],
                'itemname' => $_POST['single_ck_name'],
                'brandname' => $_POST['single_ck_brand'],
                'oquantity' => $quantity,
                'price' => $price,
                'brandid' => $brand,
                'itemid' => $item_id

            ];

            if (item_cookie($data)) {
                if (isset($_POST['addtocart_index'])) {

                    $curmethod = $this->curmethodmodal->getmethod();
                    redirect('allfragrance?page=1&' . $curmethod);

                }

                return true;
            } else {
                return false;
            }




            //   ORDER 

            // if ($userid != '') {
            //     if (!$this->hasitem($item_id)) {

            //         $this->db->dbquery('INSERT INTO orders (item_id, price, quantity, brand_id, user_id) VALUES (:itemid, :price, :quantity, :brand, :user_id)');
            //         $this->db->dbbind(':itemid', $item_id);
            //         $this->db->dbbind(':price', $price);
            //         $this->db->dbbind(':quantity', $quantity);
            //         $this->db->dbbind(':brand', $brand);
            //         $this->db->dbbind(':user_id', $userid);

            //         if ($this->db->dbexecute()) {
            //             if (isset($_POST['addtocart_index'])) {

            //                 $curmethod = $this->curmethodmodal->getmethod();
            //                 redirect('allfragrance?page=1&' . $curmethod);

            //             }

            //             return true;


            //         } else {
            //             return false;
            //         }

            //     }
            // }





        }



    }



    // public function cart_items_show()
    // {
    //     $this->db->dbquery('SELECT *,o.quantity AS oquantity,o.id AS cartorderid,i.name AS itemname, b.name AS brandname FROM orders o LEFT JOIN items i ON i.id = o.item_id LEFT JOIN brands b ON b.id = i.brand_id WHERE o.user_id = :userid');
    //     $this->db->dbbind(':userid', $_SESSION['user_id']);
    //     return $this->db->getmultidata();

    // }

    public function update()
    {


        if (isset($_POST['qty_increase'])) {
            $qty = $_POST['cart_qty_inc'];
        } elseif (isset($_POST['qty_decrease'])) {
            $qty = $_POST['cart_qty_dec'] <= 1 ? 1 : $_POST['cart_qty_dec'];
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $item_id = $_POST['cart_qty_id'];

            $data = [
                'oquantity' => $qty,
                'itemid' => $item_id
            ];


            if (item_update_cookie($data)) {
                return true;
            } else {
                return false;
            }
        }



        // ORDER 

        // if ($_SESSION['user_id']) {

        //     if (isset($_POST['qty_increase'])) {
        //         $qty = $_POST['cart_qty_inc'];
        //     } elseif (isset($_POST['qty_decrease'])) {
        //         $qty = $_POST['cart_qty_dec'] <= 1 ? 1 : $_POST['cart_qty_dec'];
        //     }


        //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //         $id = $_POST['cart_qty_id'];
        //         $this->db->dbquery('UPDATE orders SET quantity = :qty WHERE id = :id');
        //         $this->db->dbbind(':qty', $qty);
        //         $this->db->dbbind(':id', $id);
        //         $this->db->dbexecute();
        //     }


        // } else {


        // }

    }



    // delete cart items
    public function destroy()
    {
        if (isset($_POST['cart_delmodal_btn']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $id = $_POST['cart_delete_id'];
            $this->db->dbquery("DELETE FROM orders WHERE id = :id");
            $this->db->dbbind(':id', $id);
            $this->db->dbexecute();
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $item_id = $_POST['cart_delete_id'];

            $data = [
                'itemid' => $item_id
            ];

            if (item_destroy_cookie($data)) {
                return true;
            } else {
                return false;
            }
        }
    }


    // check item exit or not 
    public function hasitem($item_id)
    {
        $userid = $_SESSION['user_id'];

        $this->db->dbquery('SELECT item_id FROM orders WHERE item_id = :item_id AND user_id = :user_id');
        $this->db->dbbind(':item_id', $item_id);
        $this->db->dbbind(':user_id', $userid);


        $this->db->getsingledata();

        if ($this->db->getsingledata() > 0) {
            return true;
        } else {
            return false;
        }



    }


    // Ship 
    public function insertshipcost()
    {
        $shipvalue = $_POST['shipcost'];

        // // login 
        // if ($_SESSION['user_id']) {
        //     if (!$this->hasuser()) {
        //         $this->db->dbquery('INSERT INTO shipping (user_id,method) VALUES (:user_id,:method)');
        //         $this->db->dbbind(':user_id', $_SESSION['user_id']);
        //         $this->db->dbbind(":method", $shipvalue);
        //         $this->db->dbexecute();
        //     } else {
        //         $this->db->dbquery('UPDATE shipping SET method = :method WHERE user_id = :user_id');
        //         $this->db->dbbind(':user_id', $_SESSION['user_id']);
        //         $this->db->dbbind(":method", $shipvalue);
        //         $this->db->dbexecute();
        //     }
        // }



        // cookie 

        $shipmethod = [
            'method' => $_POST['shipcost'] ? $_POST['shipcost'] : 0,
        ];

        shipmethod_update_cookie($shipmethod);




    }


    public function selectshipcost()
    {


        if ($_SESSION['user_id']) {
            $this->db->dbquery('SELECT method FROM shipping WHERE user_id = :userid');
            $this->db->dbbind(':userid', $_SESSION['user_id']);
            return $this->db->getsingledata();

        }



    }


    // check user has or not 
    public function hasuser()
    {
        $userid = $_SESSION['user_id'];

        $this->db->dbquery('SELECT user_id FROM shipping WHERE user_id = :user_id');
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