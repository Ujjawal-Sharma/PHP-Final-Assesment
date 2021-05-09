<?php 
include_once '../classes/chatTable.class.php';
session_start();

if(isset($_POST['message']))
{
$message = $_POST['message'];
// print_r($message);
// echo "<h1>".$message."</h1>";
// die("here");
$obj = new Chat();
$from_id = $_SESSION['id'];
$to_id = $_SESSION['to_id'];

$res = $obj->insertMessage($from_id, $message, $to_id);

$row = $obj->fetchMessages($from_id, $to_id);
   // $len = count($row);
  if($row > 0)
   foreach($row as $r) {
    if($r['from_id'] === $_SESSION['id']) {
        echo "
        <div class=\"row msg_container base_sent\">
        <div class=\"col-xs-10\">
            <div class=\"messages msg_sent d-flex justify-content-end\">
                <p><small>You • ".$r['created_at']."</small><br>".$r['message']."</p>
            </div>
        </div>
    </div>"; 
    }
    else { 
    echo "<div class=\"row msg_container base_receive\">
        <div class=\" col-xs-10\">
            <div class=\"messages msg_receive d-flex justify-content-start\">
                <p><small>Other • 51 min</small><br>".$r['message']."</p>
            </div>
        </div>
    </div>";
} 
}
}
?>