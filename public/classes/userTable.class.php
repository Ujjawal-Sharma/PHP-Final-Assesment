<?php
include_once 'dbConnect.class.php';
session_start();

class UsersTable {
    private $obj;
    public function __construct() {
        $this->obj = new Database();
    }

    public function fetchUsers() {
      $sql = "SELECT * FROM users";
      $res = $this->obj->queryDb($sql);
      return $res;
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $res = $this->obj->queryDb($sql);
        return $res[0];
    }

    public function isTableExists($table) {
        $sql = "SELECT tablename
        FROM pg_catalog.pg_tables
        WHERE schemaname != 'pg_catalog' AND 
        schemaname != 'information_schema' AND tablename like '$table'";
        $row = $this->obj->queryDb($sql);
        
        if($row == 1) {
           return true;
        }
        else {
           return false;
        }
     }

     public function addUser($username, $email, $password) {
      $sql = "insert into users (username, email, password) values('$username', '$email', '$password');";
      $row = $this->obj->queryDb($sql);
      //echo "inserted in users table success";
      return $row;
     }

     public function updateUser($username, $email, $password, $id) {
      $sql = "update users set username='$username', email='$email', password='$password', updated_at = now() where id=$id";
      $row = $this->obj->queryDb($sql);
      //echo "inserted in users table success";
      return $row;
     }

     public function isAdmin($username) {
        $sql = "SELECT role FROM users WHERE username = '$username'";
        $result = $this->obj->queryDb($sql);
        if($result[0]['role'] == 'Admin') {
           return true;
        } else {
           return false;
        }
     }

     public function fetchSingleUser($id) {
      $sql = "SELECT  userprofile.firstname, 
      userprofile.lastname, users.email, userprofile.phone, interests.name,
      users.username,  users.password FROM users INNER JOIN userprofile 
      ON users.id = userprofile.user_id INNER JOIN interests ON 
      interests.user_id = userprofile.user_id WHERE users.id=$id;";
      $result = $this->obj->queryDb($sql);
      return $result[0];
     }

     public function fetchAllUsers() {
        if($_SESSION['isAdmin'] === 'Admin') 
        $sql = "SELECT username,id from users where role = 'Author'";
        else
        $sql = "SELECT username,id from users where role = 'Admin'";
        $result = $this->obj->queryDb($sql);
        return $result;
     }

     public function banUser($id) {
        $sql = "UPDATE users SET status='-1', updated_at = now() WHERE id = '$id'";
        $result = $this->obj->queryDb($sql);
        return $result;
     }

     public function unbanUser($id) {
      $sql = "UPDATE users SET status='0' , updated_at = now() WHERE id = '$id'";
      $result = $this->obj->queryDb($sql);
      return $result;
   }

   public function makeAdmin($id) {
      $sql = "UPDATE users SET role='Admin', updated_at = now() WHERE id = '$id'";
      $result = $this->obj->queryDb($sql);
      return $result;
   }

   public function makeNormal($id) {
    $sql = "UPDATE users SET role='Author' , updated_at = now() WHERE id = '$id'";
    $result = $this->obj->queryDb($sql);
    return $result;
 }

    public function lastId() {
        $sql = "SELECT lastval();";
        $user_id = $this->obj->queryDb($sql);
        return $user_id[0]['lastval'];
    }
   

}
?>