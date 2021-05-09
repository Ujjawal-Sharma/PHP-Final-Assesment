<?php 
include_once '../classes/examsbyuserTable.class.php';
session_start();

$obj = new Examsbyuser();

$id = $_GET['id'];
$ret = $obj->changeStatus($id);

array_push($_SESSION['success'], "Submitted successfully.");
header('Location:../front/index.php');
?>