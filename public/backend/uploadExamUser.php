<?php

session_start();
include_once '../classes/examsbyuserTable.class.php';
include_once '../classes/solutionsbyuserTable.class.php';

$obj = new Examsbyuser();
$obj1 = new Solutionsbyuser();

$count = 0;
$questionaire = $_GET['questionaire'];
$len = $_GET['count'];
$ret = $obj->insertExam($_SESSION['username'],$_SESSION['id'], $questionaire);
$exam_id = $obj->fetchExamId($_SESSION['username']);
// print_r($ret);
// die("here");
while($count < $len) {
    $index = "ans".$count;
    // print_r($_POST[$index]);
   $ret = $obj1->insertSolution($exam_id, $_POST[$index], 'open');
    $count = $count + 1;
}
// print_r($_POST['radio']);
$ret = $obj1->insertSolution($exam_id, $_POST['radio'], 'single');
foreach($_POST['check_list'] as $chk)

$ret = $obj1->insertSolution($exam_id, $chk, 'multiple');

array_push($_SESSION['success'], "Your exam has been submitted");
header('Location:../front/index.php');

?>