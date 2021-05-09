<?php 
session_start();

include_once '../classes/userTable.class.php';
$id = $_GET['id'];
$obj = new UsersTable();
$result = $obj->banUser($id);
if(!$result) {
    array_push($_SESSION['errors'], "Account with ID:$id has been locked.");
header('Location:../front/index.php');
} else {
    array_push($_SESSION['errors'], "Failed to delete user");
    header('Location:../front/index.php');
}
?>
