<?php 
session_start();

include_once '../classes/userTable.class.php';
$id = $_GET['id'];
$obj = new UsersTable();
$result = $obj->makeAdmin($id);
if(!$result) {
    array_push($_SESSION['errors'], "Account with ID:$id is Admin now.");
header('Location:../front/index.php');
} else {
    array_push($_SESSION['errors'], "Failed to make Admin");
    header('Location:../front/index.php');
}
?>