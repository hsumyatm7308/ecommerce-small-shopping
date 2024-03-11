<?php

require_once("config/access.php");

class Database
{
    private $dbhost = DB_HOST;
    private $dbuser = DB_USER;
    private $dbpassword = DB_PASSWORD;
    private $dbname = DB_NAME;

    private $conn;
    private $error;
    private $stmt;

    private $dbconnected = false;


    public function __construct()
    {

        $options = [PDO::ATTR_PERSISTENT, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        try {

            $this->conn = new PDO("mysql:dbhost=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpassword, $options);

        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }

    }


    public function geterror()
    {
        return $this->error;
    }

    public function isconnected()
    {
        return $this->dbconnected;
    }


    public function dbquery($query)
    {
        $this->stmt = $this->conn->prepare($query);
    }

    public function dbbind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_string($value):
                    $type = PDO::PARAM_STR;
                    break;
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }



    public function dbexecute()
    {
        return $this->stmt->execute();
    }

    public function dbmultifetchall()
    {
        $this->dbexecute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function dbsinglefetch()
    {
        $this->dbexecute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function dbrowcount()
    {
        return $this->stmt->rowCount();

    }
}





?>