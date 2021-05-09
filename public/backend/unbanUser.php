<?php 
session_start();

include_once '../classes/userTable.class.php';
$id = $_GET['id'];
$obj = new UsersTable();
$result = $obj->unbanUser($id);
if(!$result) {
    array_push($_SESSION['success'], "Account with ID:$id has been unlocked.");
header('Location:../front/index.php');
} else {
    array_push($_SESSION['errors'], "Failed to delete user");
    header('Location:../front/index.php');
}
?>
