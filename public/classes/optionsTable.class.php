<?php 
include_once 'dbConnect.class.php';

class Options {
    private $obj;
    public function __construct() {
        $this->obj = new Database();
    }
    
    public function insertOptions($ques_id, $option) {
      $sql = "insert into options (ques_id, option) values($ques_id, '$option');";
      $res = $this->obj->queryDb($sql);
      return $res;
    }

    public function fetchOptions($id) {
        $sql = "SELECT option FROM options where ques_id = $id;";
        $res = $this->obj->queryDb($sql);
        return $res;
      }

    public function updateOptions($ques_id, $option) {
        $sql = "UPDATE options SET option = '$option', updated_at = now() WHERE id = '$ques_id'";
        $result = $this->obj->queryDb($sql);
        return $result;
    }
}

?>