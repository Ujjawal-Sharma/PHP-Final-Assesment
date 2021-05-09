<?php
include_once 'dbConnect.class.php';

class UserprofileTable {
    
    private $obj;
    private $db;
    public function __construct() {
        $this->obj = new Database();
    }

    public function addProfile($user_id, $firstname, $lastname, $phone) {
        $sql = "INSERT INTO userprofile (user_id, firstname, lastname, phone) 
        VALUES($user_id, '$firstname', '$lastname', '$phone');";
        $ret = $this->obj->queryDb($sql);
        //echo "inserted in userprofile table success";
        return $ret;
    }

    public function updateProfile($firstname, $lastname, $phone, $id) {
        $sql = "update userprofile set firstname='$firstname', lastname='$lastname', phone=$phone, updated_at = now() where user_id=$id";
        $ret = $this->obj->queryDb($sql);
        //echo "inserted in userprofile table success";
        return $ret;
    }

}

?>