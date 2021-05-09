<?php
if(!isset($_SESSION['login'])) {
include 'loginForm.php';
include_once 'registrationForm.php';
} else {
include_once 'home.php';
include_once 'chatbox.php';
include_once 'adminProfile.php';
include_once 'users.php';
}
?>