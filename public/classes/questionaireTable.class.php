<?php
include_once 'dbConnect.class.php';

class Questionaire {
    private $obj;
    public function __construct() {
        $this->obj = new Database();
    }

    public function insertQuestionsQ($name, $timelimit, $category, $ques_id) {
      $sql = "INSERT INTO questionaire (name, timelimit, category, ques_id) 
      values('$name', $timelimit, '$category', $ques_id);";
      $res = $this->obj->queryDb($sql);
      return $res;
    }

    public function fetchAllQuestionaires($category) {
        $sql = "SELECT DISTINCT name from questionaire where category = '$category'";
        $res = $this->obj->queryDb($sql);
        return $res;
    }

    public function fetchAllQuesIdTime($name) {
        $sql = "SELECT ques_id, timelimit from questionaire where name = '$name'";
        $res = $this->obj->queryDb($sql);
        return $res;
    }

    public function fetchTotalQues($name) {
        $sql = "SELECT count(ques_id) from questionaire where name = '$name'";
        $res = $this->obj->queryDb($sql);
        return $res[0];
    }


}
?>