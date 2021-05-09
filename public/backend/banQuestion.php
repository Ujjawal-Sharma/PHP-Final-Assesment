<?php 
session_start();

include_once '../classes/questionsTable.class.php';
$id = $_GET['id'];
$obj = new Questions();
$result = $obj->banQuestion($id);
if(!$result) {
    array_push($_SESSION['errors'], "Question with ID:$id has been locked.");
header('Location:../front/index.php');
} else {
    array_push($_SESSION['errors'], "Failed to lock question");
    header('Location:../front/index.php');
}
?>
