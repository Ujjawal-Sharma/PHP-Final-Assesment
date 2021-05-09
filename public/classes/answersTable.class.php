<?php 
include_once 'dbConnect.class.php';

class Answers {
    private $obj;
    public function __construct() {
        $this->obj = new Database();
    }
    
    public function insertAnswer($ques_id, $answer) {
      $sql = "insert into answers (ques_id, answer) values($ques_id, '$answer');";
      // print_r($sql);
      // die("here");
      $res = $this->obj->queryDb($sql);
      return $res;
    }
    public function updateAnswer($ques_id, $answer) {
        $sql = "UPDATE answers SET answer = '$answer', updated_at = now() WHERE ques_id = '$ques_id'";
        $result = $this->obj->queryDb($sql);
        return $result;
     }
}

?>