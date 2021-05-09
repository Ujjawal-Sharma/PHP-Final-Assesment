<?php 
include_once '../classes/chatTable.class.php';
session_start();
//session_start();
if(isset($_REQUEST['id'])) {

$from_id = $_REQUEST['id'];
$to_id = $_SESSION['id'];
$_SESSION['to_id'] = $from_id;

$obj = new Chat();
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
                <p><small>Other • ".$r['created_at']."</small><br>".$r['message']."</p>
            </div>
        </div>
    </div>";
} 
}
} else {
    echo "id not set";
}
?>