<?php
session_start();
include_once '../classes/categoriesTable.class.php';

if(!empty($_POST['category'])) {
$obj2 = new Categories();
$category = $_POST['category'];
$ret = $obj2->insertCategory($category);
array_push($_SESSION['success'],"New category has been added.");
header('Location:../front/index.php');
} else {
    array_push($_SESSION['errors'],"New category could not be added.");
    header('Location:../front/index.php');
}
?>