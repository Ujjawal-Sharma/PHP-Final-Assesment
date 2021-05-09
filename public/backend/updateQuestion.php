<?php
include_once '../classes/questionsTable.class.php';
include_once '../classes/answersTable.class.php';
include_once '../classes/optionsTable.class.php';

$obj1 = new Answers();
$obj2 = new Options();
$obj3 = new Questions();

$id = $_GET['id'];

$question = $_POST['question'];
$category = $_POST['category'];
$type = $_POST['type'];
$answer = $_POST['answer'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];

// print_r($option1);
// print_r($option2);
// print_r($option3);
// print_r($option4);
// die("here");

$ret1 = $obj3->updateQuestion($id, $question, $category, $type);

// $ques_id = $obj3->lastId();

$ret4 = $obj2->updateOptions($id, $option1);
$ret5 = $obj2->updateOptions($id, $option2);
$ret6 = $obj2->updateOptions($id, $option3);
$ret7 = $obj2->updateOptions($id, $option4);

$ret3 = $obj1->updateAnswer($id, $answer);

array_push($_SESSION['success'], "Question has been updated.");
header('Location: ../front/index.php');
?>