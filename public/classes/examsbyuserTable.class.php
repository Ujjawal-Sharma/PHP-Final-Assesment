<?php

include_once 'dbConnect.class.php';

class Examsbyuser {
    private $obj;
    public function __construct() {
        $this->obj = new Database();
    }


    public function insertExam($name, $user_id, $questionaire) {
        $sql = "INSERT INTO examsbyuser (name, user_id, questionaire) values('$name', $user_id, '$questionaire');";
        // print_r($sql);
        // die("here");
        $res = $this->obj->queryDb($sql);
        return $res;
    }

    public function fetchExamId($name) {
        $sql = "select id from examsbyuser where name = '$name';";
        // print_r($sql);
        // die("here");
        $res = $this->obj->queryDb($sql);
        return $res[0]['id'];
    }


    public function fetchName($id) {
        $sql = "select questionaire from examsbyuser where id = $id;";
        $res = $this->obj->queryDb($sql);
        return $res[0]['questionaire'];
        // print_r($res[0]['questionaire']);
        // die("here");
    }

    public function fetchAllExams($user_id) {
        $sql = "select id, name, status, created_at, updated_at from examsbyuser where user_id = $user_id;";
        // print_r($sql);
        // die("here");
        $res = $this->obj->queryDb($sql);
        return $res;
    }

    public function fetchAllExamsAdmin() {
        $sql = "select id, name, status, created_at, updated_at from examsbyuser;";
        // print_r($sql);
        // die("here");
        $res = $this->obj->queryDb($sql);
        return $res;
    }

    public function changeStatus($id) {
        $sql = "UPDATE examsbyuser set status = 'Checked', updated_at = now() where id = $id";
        // print_r($sql);
        // die("here");
        $res = $this->obj->queryDb($sql);
        return $res;
    }

}

?>