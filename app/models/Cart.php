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




        }



    }



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


    }



    // delete cart items
    public function destroy()
    {

        $item_id = $_POST['cart_delete_id'];
        $usermodel = new User();
        $guest_id = $usermodel->guest_user_info($_SESSION['guest_email'])['id'] ?? null;
        $bindparams = [];

        $query = "DELETE FROM orders WHERE item_id = :id";
        $bindparams[':id'] = $item_id;

        if (isset($_SESSION['user_id'])) {
            $query .= " AND user_id = :userid";
            $bindparams[':userid'] = $_SESSION['user_id'];
        }

        if ($guest_id) {
            $query .= " AND guest_id = :guest_id";
            $bindparams[':guest_id'] = $guest_id;
        }

        $this->db->dbquery($query);
        foreach ($bindparams as $param => $value) {
            $this->db->dbbind($param, $value);
        }
        $this->db->dbexecute();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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

        $usermodel = new User();
        $guest_id = $usermodel->guest_user_info($_SESSION['guest_email'])['id'] ?? null;
        $bindparams = [];

        $query = "SELECT item_id FROM orders WHERE item_id = :item_id";
        $bindparams[':item_id'] = $item_id;

        if (isset($_SESSION['user_id'])) {
            $query .= " AND user_id = :userid";
            $bindparams[':userid'] = $_SESSION['user_id'];
        }

        if ($guest_id) {
            $query .= " AND guest_id = :guest_id";
            $bindparams[':guest_id'] = $guest_id;
        }

        $this->db->dbquery($query);
        foreach ($bindparams as $param => $value) {
            $this->db->dbbind($param, $value);
        }
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