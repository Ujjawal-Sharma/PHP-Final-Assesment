<?php 
include_once 'dbConnect.class.php';

class Interests {
    private $obj;
    public function __construct() {
        $this->obj = new Database();
    }

    public function addInterest($id, $name) {
        $sql = "INSERT INTO interests (user_id, name) values($id, '$name');";
        $ret = $this->obj->queryDb($sql);
        return $ret;
    }

    public function updateInterest($name, $id) {
        $sql = "update interests set name='$name', updated_at = now() where user_id=$id";
        $ret = $this->obj->queryDb($sql);
        return $ret;
    }

    public function fetchInterest($id) {
        $sql = "SELECT name from interests where user_id = $id;";
        $ret = $this->obj->queryDb($sql);
        return $ret[0];
    }
}
?>