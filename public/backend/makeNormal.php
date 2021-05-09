<?php 
session_start();

include_once '../classes/userTable.class.php';
$id = $_GET['id'];
$obj = new UsersTable();
$result = $obj->makeNormal($id);
if(!$result) {
    array_push($_SESSION['errors'], "Account with ID:$id is Normal user now.");
header('Location:../front/index.php');
} else {
    array_push($_SESSION['errors'], "Failed to make Normal user");
    header('Location:../front/index.php');
}
?>