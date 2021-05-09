<?php 
include_once '../classes/userTable.class.php';
session_start();

if(!empty($_REQUEST['email']) && !empty($_REQUEST['password'])) {
    $obj = new UsersTable();
    $row = $obj->login($_REQUEST['email'], $_REQUEST['password']);
    if($row > 0) {
        $username = $row['username'];
        $email = $row['email'];
        $id = $row['id'];
        $role = $row['role'];
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id;
        $_SESSION['isAdmin'] = $role;
        array_push($_SESSION['success'], "You're loggedIn.");
        header('Location: ../front/index.php');
    }
}


?>