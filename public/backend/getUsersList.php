<?php 
include_once '../classes/userTable.class.php';
//session_start();
$obj = new UsersTable();
    $row = $obj->fetchAllUsers();
   // $len = count($row);
//    print_r($row);
//    die("here");
    foreach($row as $r) {
    echo "<a href=\"#\" class=\"list-group-item list-group-item-action border border-bottom-0 border-left-0 border-right-0 bg-light user\" 
    id=\"".$r['id']."\"onclick=\"loadchat();\">".$r['username']."</a>";
    }
?>