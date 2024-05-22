<?php

class Shipaddress
{
    private $db;

    public $curmethodmodal;
    public $usermodal;


    public function __construct()
    {
        $this->db = new Database();

        $this->curmethodmodal = new Curitemid();
        $this->usermodal = new User();
    }

    public function create_address()
    {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $company = $_POST['company'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $zip = $_POST['zip'];
        $city = $_POST['city'];
        $state_id = $_POST['state_id'];
        $country_id = $_POST['country_id'];
        $user_id = $_SESSION['user_id'];


        $guest_id = $this->usermodal->guest_user_info($_SESSION['guest_email'])->id;


        $this->db->dbquery('INSERT INTO ship_address (firstname,lastname,company,address,phone,zip,city,state_id,country_id,user_id,guest_id) VALUES (:firstname,:lastname,:company,:address,:phone,:zip,:city,:state_id,:country_id,:user_id,:guest_id)');
        $this->db->dbbind(':firstname', $firstname);
        $this->db->dbbind(':lastname', $lastname);
        $this->db->dbbind(':company', $company);
        $this->db->dbbind(':address', $address);
        $this->db->dbbind(':phone', $phone);
        $this->db->dbbind(':zip', $zip);
        $this->db->dbbind(':city', $city);
        $this->db->dbbind(':state_id', $state_id);
        $this->db->dbbind(':country_id', $country_id);
        $this->db->dbbind(':user_id', $user_id);
        $this->db->dbbind(':guest_id', $guest_id);
    }
}


?>