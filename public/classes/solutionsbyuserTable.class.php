<?php

include_once 'dbConnect.class.php';

class Solutionsbyuser {
    private $obj;
    public function __construct() {
        $this->obj = new Database();
    }


    public function insertSolution($exam_id, $solution, $type) {
        $sql = "INSERT INTO solutionsbyuser (exam_id, solution, type) values($exam_id, '$solution', '$type');";
        $res = $this->obj->queryDb($sql);
        return $res;
    }

    public function fetchOpenSolution() {
        $sql = "SELECT solution FROM solutionsbyuser where type = 'open';";
        $res = $this->obj->queryDb($sql);
        return $res;
    }

    public function fetchSingleSolution() {
        $sql = "SELECT solution FROM solutionsbyuser where type = 'single';";
        $res = $this->obj->queryDb($sql);
        return $res;
    }

    public function fetchMultipleSolution() {
        $sql = "SELECT solution FROM solutionsbyuser where type = 'multiple';";
        $res = $this->obj->queryDb($sql);
        return $res;
    }
}


?>