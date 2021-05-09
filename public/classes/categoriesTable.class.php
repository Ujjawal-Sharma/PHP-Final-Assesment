<?php 
include_once 'dbConnect.class.php';

class Categories {
    private $obj;
    public function __construct() {
        $this->obj = new Database();
    }
    
    public function fetchAll() {
      $sql = "SELECT category FROM categories;";
      $res = $this->obj->queryDb($sql);
      return $res;
    }

    public function insertCategory($category) {
        $sql = "insert into categories (category) values('$category');";
        $res = $this->obj->queryDb($sql);
        return $res;
      }
}

?>