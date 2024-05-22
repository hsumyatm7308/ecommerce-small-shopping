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
        // echo $row['password'];


        $hashedpassword = $row['password'];

        if (password_verify($password, $hashedpassword) || $password == $hashedpassword) {
            return $row;
        } else {
            return false;
        }

    }




    public function getuserinfo()
    {
        // $useremail = $_SESSION['user_email'];
        $useremail = $_SESSION['user_id'];

        // $this->db->dbquery('SELECT * FROM users WHERE email = :email');
        // $this->db->dbbind(':email', $useremail);

        $this->db->dbquery('SELECT * FROM users WHERE id = :id');
        $this->db->dbbind(':id', $useremail);
        return $this->db->getsingledata();
    }


    public function guest_email($email)
    {
        if (isset($_POST['guest_email_btn'])) {
            $this->db->dbquery('INSERT INTO guests (email) VALUES (:email)');
            $this->db->dbbind(':email', $email);
            if ($this->db->dbexecute()) {
                return true;
            } else {
                return false;
            }
        }
    }


    public function guest_email_check($email)
    {
        $this->db->dbquery("SELECT * FROM guests WHERE email=:email");
        $this->db->dbbind(':email', $email);


        $this->db->getsingledata();

        if ($this->db->rowcount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function guest_email_update($data)
    {
        $this->db->dbquery('UPDATE guests SET email=:email WHERE id = :id');
        $this->db->dbbind(':email', $data['guest_email']);

        $this->db->dbbind(":id", $data['id']);

        $this->db->dbexecute();

    }

    public function guest_user_info($email)
    {
        $this->db->dbquery("SELECT * FROM guests WHERE email=:email");
        $this->db->dbbind(':email', $email);
        return $this->db->getsingledata();
    }
}



?>