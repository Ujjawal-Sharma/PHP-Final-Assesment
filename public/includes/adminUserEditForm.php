<?php
session_start();
if($_SESSION['isAdmin'] === 'Admin') {
include_once '../classes/userTable.class.php';
include_once '../classes/categoriesTable.class.php';
include_once 'header.php';

$id=$_GET['id'];

$obj = new UsersTable();
$obj1 = new Categories();

$categories = $obj1->fetchAll();
// print_r($categories);
// die("here");
$result = $obj->fetchSingleUser($id);

$firstname = $result['firstname'];
$lastname = $result['lastname'];
$email = $result['email'];
$phone = $result['phone'];
$username = $result['username'];
$password = $result['password'];
$interests = $result['name'];
?>

<div class="container col-lg-10">
    <div class="row py-3 mt-3 align-items-center">

        <div class="col-md-10 col-lg-10 ml-auto mr-auto mt-2">
        <div class="card ml-auto mr-auto mb-2 p-5 align-middle profile-form">

                    <div class="d-flex justify-content-start mb-4">
                        <a href="javascript:history.back()" class="btn btn-md back-btn"><i class="fas fa-arrow-left">&nbsp;</i></a>
                    </div>
                
            <form action="../backend/updateUser.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                <div class="row">


        <div class="form-group col-lg-12 d-flex align-items-center mb-3">
            <div class="border-bottom w-75 ml-5 "></div>
                <div class="d-flex justify-content-center px-2 text-primary font-weight-bold h3">
                        <div class="profile-pic file position-relative d-flex align-items-center justify-content-center"
                         style="background-image:url('../Storage/Images/demo.png')" >
                         <i class="fas fa-camera"></i>
                        </div>
                    </a>
                </div>
            <div class="border-bottom w-75 mr-5"></div>
        </div>


                    <!-- First Name -->
                    <div class="form-group col-lg-6 mb-4">
                        <label class="label">First name</label>
                        <input id="firstName" type="text" name="firstname" placeholder="First Name" 
                        class="form-control bg-white border-md" value="<?php echo $firstname ?>">
                    </div>

                    <!-- Last Name -->
                    <div class="form-group col-lg-6 mb-4">
                        <label class="label">Last name</label>
                        <input id="lastName" type="text" name="lastname" placeholder="Last Name" 
                        class="form-control bg-white  border-md" value="<?php echo $lastname ?>">
                    </div>
                    
                    <!-- Email Address -->
                    <div class="form-group col-lg-6 mb-4">
                         <label class="label">Email</label>
                        <input id="email" type="email" name="email" placeholder="Email Address" 
                        class="form-control bg-white  border-md" value="<?php echo $email ?>">
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group col-lg-6 mb-4">
                        <label class="label">Phone</label>
                        <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" 
                        class="form-control bg-white border-md  pl-3" value="<?php echo $phone ?>">
                    </div>


                    <!-- Username -->
                    <div class="form-group col-lg-12 mb-4">
                         <label class="label">Username</label>
                        <input id="username" type="text" name="username" placeholder="Username" 
                        class="form-control bg-white  border-md" value="<?php echo $username ?>">
                    </div>

                    <!-- Password -->
                    <div class="form-group col-lg-6 mb-4">
                        <label class="label">Password</label>
                        <input id="password" type="password" name="password" placeholder="Password" 
                        class="form-control bg-white border-md" value="<?php echo $password ?>">
                    </div>

                    <!-- Password Confirmation -->
                    <div class="form-group col-lg-6 mb-4">
                        <label class="label">Confirm Password</label>
                        <input id="password
                        Confirmation" type="password" name="confirmpassword" placeholder="Confirm Password" 
                        class="form-control bg-white border-md">
                    </div>

                      <!-- Interests -->
                      <div class="input-group col-lg-12 mb-4">
                        <select name="interests" class="form-select form-control" required>
                            <option value="" disabled>Interests</option>
                            <?php foreach($categories as $cat){ ?>
                                        <option value="<?php echo $cat['category']; ?>"
                                        <?php if ($interests == $cat['category']) echo ' selected="selected"'; ?>><?php echo $cat['category']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="" class="btn  btn-block py-2 shadow" id="update-btn">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
<?php
include_once '../includes/footer.php';

} else {
    header('Location:../front/index.php');
}

?>