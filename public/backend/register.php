<?php 
include_once '../classes/userTable.class.php';
include_once '../classes/userprofileTable.class.php';
include_once '../classes/dbConnect.class.php';
include_once '../classes/interestsTable.class.php';

if(!empty($_POST['firstname']) && !empty($_POST['lastname']) 
    && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['username'])
    && !empty($_POST['password']) && !empty($_POST['confirmpassword'])) {
         
        $obj1 = new UsersTable();
        $obj2 = new UserprofileTable();
        $obj3 = new Interests();

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        //ask about country code and phone no. binding
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassowrd = $_POST['confirmpassword'];
        $interests = $_POST['interests'];

        $ret1 = $obj1->addUser($username, $email, $password);
        $user_id = $obj1->lastId();
        $ret2 = $obj2->addProfile($user_id, $firstname, $lastname, $phone, $interests);
        $ret3 = $obj3->addInterest($user_id, $interests);
        //array_push($_SESSION['success'],"Acoount has been created.");
        header('Location: ../front/index.php');
} else {
    header('Location:../front/index.php');
}

?>
