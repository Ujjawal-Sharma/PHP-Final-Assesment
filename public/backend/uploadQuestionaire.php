<?php
include_once '../classes/questionaireTable.class.php';
session_start();
$checklist = $_POST['check_list'];
$timelimit = $_POST['timelimit'];
$name = $_POST['name'];
$category = $_POST['category'];

if(!empty($checklist)) {
    $obj = new questionaire();
    foreach($checklist as $chk)
    $obj->insertQuestionsQ($name, $timelimit, $category, $chk);
    array_push($_SESSION['success'], "Questionaire has been created");
    header('Location:../front/index.php');
}

// foreach($checklist as $chk)
// print_r($chk);

// echo $timelimit." ".$name;
?>