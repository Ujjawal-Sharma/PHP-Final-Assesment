<?php
// if (isset($_POST['submit'])) 
// {

    session_start();
include_once '../classes/questionsTable.class.php';
include_once '../classes/answersTable.class.php';

$handle = fopen($_FILES['filename']['tmp_name'], "r");
$obj = new Questions();
$obj2 = new Answers();

$row = 1;
$d = array();
if ($handle) {
  while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
    $num = count($data);
    echo "<p> $num fields in line $row: <br /></p>\n";
    for ($c=0; $c < $num; $c++) {
        $d[$c] = $data[$c];
        echo $d[$c] . "<br />\n";
       // $question = 
    }
    if($row>1 && $d[0] !== '' && $d[1] !== '' && $d[2] !== '' && $d[3] !== '') {

        $id = $obj->checkIfExist($d[0]);
        if($id > 0) {
        //print_r($isExist);
   // die("here");
        $ret = $obj->updateQuestion($id, $d[0],$d[1],$d[2]);
        $last_id = $obj->lastId();
        $ret = $obj2->updateAnswer($id, $d[3]);
    }   else {
        $ret = $obj->insertQuestion($d[0],$d[1],$d[2]);
        $last_id = $obj->lastId();
        $ret = $obj2->insertAnswer($last_id, $d[3]);
        }
    }
    $row++;
  }
  fclose($handle);
}

array_push($_SESSION['success'], "Uploaded Successfully");
header('Location:../front/index.php');
?>

