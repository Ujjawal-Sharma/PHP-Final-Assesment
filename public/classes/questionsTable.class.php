<?php 
include_once 'dbConnect.class.php';

class Questions {
    private $obj;
    public function __construct() {
        $this->obj = new Database();
    }
    
    public function insertQuestion($question, $category, $type) {
      $sql = "insert into questions (question, category, type) values('$question', '$category', '$type');";
    //   print_r($sql);
    //   die("here");
      $res = $this->obj->queryDb($sql);
      return $res;
    }

    public function fetchQuestions() {
        $sql = "SELECT * FROM questions";
        $ret = $this->obj->queryDb($sql);
        return $ret;
    }

    public function fetchQuestionsForQ() {
        $sql = "SELECT id, question, category,type FROM questions where status = '0'";
        $ret = $this->obj->queryDb($sql);
        return $ret;
    }

    public function banQuestion($id) {
        $sql = "UPDATE questions SET status='-1', updated_at = now() WHERE id = '$id'";
        $result = $this->obj->queryDb($sql);
        return $result;
     }

     public function unbanQuestion($id) {
      $sql = "UPDATE questions SET status='0' , updated_at = now() WHERE id = '$id'";
      $result = $this->obj->queryDb($sql);
      return $result;
   }

   public function fetchSingleQuestion($id) {
    $sql = "SELECT questions.question, 
    questions.category, questions.type, answers.answer
    FROM questions INNER JOIN answers
    ON questions.id = answers.ques_id WHERE questions.id=$id;";
    $result = $this->obj->queryDb($sql);
    return $result[0];
   }

   public function updateQuestion($id, $question, $category, $type) {
    $sql = "UPDATE questions SET question = '$question', category = '$category', type = '$type', updated_at = now() WHERE id = '$id'";
    // print_r($sql);
    // die("here");
    $result = $this->obj->queryDb($sql);
    return $result;
   }

    public function lastId() {
        $sql = "SELECT lastval();";
        $user_id = $this->obj->queryDb($sql);
        return $user_id[0]['lastval'];
    }

    public function checkIfExist($question) {
        $sql = "select id from questions where question = '$question';";
        $res = $this->obj->queryDb($sql);
        return $res[0]['id'];
    }
    
}

?>