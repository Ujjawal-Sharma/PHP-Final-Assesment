<?php 
include_once '../classes/userprofileTable.class.php';
include_once '../classes/userTable.class.php';
include_once '../classes/interestsTable.class.php';

$id = $_GET['id'];
$obj1 = new UsersTable();
$obj2 = new UserprofileTable();
$obj3 = new Interests();

if(!empty($_POST['firstname']) && !empty($_POST['lastname']) 
    && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['username'])
    && !empty($_POST['password'])) {


        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        //ask about country code and phone no. binding
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassowrd = $_POST['confirmpassword'];
        $interests = $_POST['interests'];

        $ret1 = $obj1->updateUser($username, $email, $password, $id);
        //$user_id = $obj3->lastId();
        $ret2 = $obj2->updateProfile($firstname, $lastname, $phone, $id);
       // $folder = $_SERVER['DOCUMENT_ROOT']."/php-assessment/public/Storage/Images/Profile/".$filenameToStore;
        $ret3 = $obj3->updateInterest($interests, $id);

        array_push($_SESSION['success'],"Profile has been updated");
        //die("updated");
        header('location:../front/index.php');
} else {
    array_push($_SESSION['errors'],"Could not update Profile");
    header('location:../front/index.php');
}

?>