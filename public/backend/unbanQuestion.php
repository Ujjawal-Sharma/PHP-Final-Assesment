<?php 
session_start();

include_once '../classes/questionsTable.class.php';
$id = $_GET['id'];
$obj = new Questions();
$result = $obj->unbanQuestion($id);
if(!$result) {
    array_push($_SESSION['success'], "Question with ID:$id has been unlocked.");
header('Location:../front/index.php');
} else {
    array_push($_SESSION['errors'], "Failed to unlock question");
    header('Location:../front/index.php');
}
?>
