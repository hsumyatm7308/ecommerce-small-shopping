<?php
class Otp{

    private $db;
    public function __construct() {
        $this->db = new Database();
    }

    public function storeotp($otp_hash,$userid,$expires){
        $this->db->dbquery('DELETE FROM user_otps WHERE user_id = :id');
        $this->db->dbbind(':id' ,$userid);
        $this->db->dbexecute();

        $this->db->dbquery("INSERT INTO user_otps (user_id, otp_hash, expires_at, attempts_left) VALUES (:id, :otp, :exp, :atm)");
        $this->db->dbbind(":id",$userid);
        $this->db->dbbind(":otp",$otp_hash);
        $this->db->dbbind(":exp",$expires);
        $this->db->dbbind(":atm" ,3);
        if( $this->db->dbexecute()){
            return true;
        }else{
            return false;
        }
        echo $otp_hash;
        echo $userid;
        echo $expires;
    }
}
?>