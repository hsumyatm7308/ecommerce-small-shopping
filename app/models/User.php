<?php

class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function register($data)
    {
        $this->db->dbquery('INSERT INTO users(name,email,password) VALUES (:name,:email,:password)');
        $this->db->dbbind(':name', $data['fullname']);
        $this->db->dbbind(':email', $data['email']);
        $this->db->dbbind(':password', $data['password']);
        if ($this->db->dbexecute()) {
            return true;
        } else {
            return false;
        }

    }


    public function registeremailcheck($email)
    {
        $this->db->dbquery("SELECT * FROM users WHERE email=:email");
        $this->db->dbbind(':email', $email);


        $this->db->getsingledata();

        if ($this->db->rowcount() > 0) {
            return true;
        } else {
            return false;
        }

    }


    public function login($email, $password)
    {
        $this->db->dbquery("SELECT * FROM users WHERE email=:email");
        $this->db->dbbind(':email', $email);


        $row = $this->db->getsingledata();


        // var_dump($row);

        // echo $row->password; //// Attampt to property = asso ko obj nae swal htote htar loh   fetch(PDO::FETCH_ASSOC)
        echo $row['password'];


        $hashedpassword = $row['password'];

        if (password_verify($password, $hashedpassword)) {
            return $row;
        } else {
            return false;
        }

    }
}



?>