<?php
include_once 'dbConnect.class.php';

class Chat {
    private $obj;
    public function __construct() {
        $this->obj = new Database();
    }

    public function fetchMessages($from_id, $to_id) {
        $sql = "select * from chat where (from_id = $to_id or from_id = $from_id) and (to_id = $from_id or to_id = $to_id)";
        $res = $this->obj->queryDb($sql);      
        return $res;
    }

    public function insertMessage($from, $message, $to) {
        $sql = "insert into chat (from_id, to_id, message) values($from, $to, '$message');";
        $res = $this->obj->queryDb($sql);     
        return true;
    }
}

?>