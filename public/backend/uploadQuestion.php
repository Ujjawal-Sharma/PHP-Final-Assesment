<?php
include_once '../classes/questionsTable.class.php';
include_once '../classes/answersTable.class.php';
include_once '../classes/optionsTable.class.php';
session_start();
$obj1 = new Answers();
$obj2 = new Options();
$obj3 = new Questions();


$question = $_POST['question'];
$category = $_POST['category'];
$type = $_POST['type'];
$answer = $_POST['answer'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];

$ret1 = $obj3->insertQuestion($question, $category, $type);

$ques_id = $obj3->lastId();

$ret = $obj2->insertOptions($ques_id, $option1);
$ret = $obj2->insertOptions($ques_id, $option2);
$ret = $obj2->insertOptions($ques_id, $option3);
$ret = $obj2->insertOptions($ques_id, $option4);

$ret3 = $obj1->insertAnswer($ques_id, $answer);

array_push($_SESSION['success'], "Question has been added.");
header('Location: ../front/index.php');
?>