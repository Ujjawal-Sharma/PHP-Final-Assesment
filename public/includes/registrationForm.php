
<div class="container col-lg-10" id="register-form" style="display:none;">


<?php 
include_once '../classes/categoriesTable.class.php';

$obj1 = new Categories();
$categories = $obj1->fetchAll();
?>
    <div class="row py-3 mt-3 align-items-center">
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="https://res.cloudinary.com/mhmd/image/upload/v1569543678/form_d9sh6m.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
        </div>

        <!-- Registeration Form -->
        <div class="col-md-7 col-lg-5 ml-auto mt-2">
        <div class="card ml-auto mb-2 p-5 align-middle bg-light shadow">
        <div class="form-group col-lg-12 d-flex align-items-center mb-3">
            <div class="border-bottom w-75 ml-5 "></div>
                <span class="px-2 font-weight-bold register-heading">EasySignUp</span>
            <div class="border-bottom w-75 mr-5"></div>
        </div>
            <form action="../backend/register.php" method=POST>
                <div class="row">

                    <!-- First Name -->
                    <div class="input-group col-lg-6 mb-4">
                        <input id="firstName" type="text" name="firstname" placeholder="First Name"
                         class="form-control bg-white border-md" required>
                    </div>

                    <!-- Last Name -->
                    <div class="input-group col-lg-6 mb-4">
                        <input id="lastName" type="text" name="lastname" placeholder="Last Name" 
                        class="form-control bg-white  border-md" required>
                    </div>

                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <input id="email" type="email" name="email" placeholder="Email Address" 
                        class="form-control bg-white  border-md" required>
                    </div>

                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" 
                        class="form-control bg-white border-md  pl-3" required>
                    </div>


                    <!-- Username -->
                    <div class="input-group col-lg-12 mb-4">
                        <input id="username" type="text" name="username" placeholder="Username" 
                        class="form-control bg-white  border-md" required>
                    </div>

                    <!-- Password -->
                    <div class="input-group col-lg-6 mb-4">
                        <input id="password" type="password" name="password" placeholder="Password" 
                        class="form-control bg-white border-md" required>
                    </div>

                    <!-- Password Confirmation -->
                    <div class="input-group col-lg-6 mb-4">
                        <input id="passwordConfirmation" type="password" name="confirmpassword" 
                        placeholder="Confirm Password" class="form-control bg-white border-md" required>
                    </div>
                     <!-- Interests -->
                    <div class="input-group col-lg-12 mb-4">
                        <select name="interests" class="form-select form-control" required>
                            <option value="" disabled selected>Interests</option>
                            <?php foreach($categories as $cat){
                                    foreach($cat as $c) { ?>
                                        <option value="<?php echo $c; ?>"><?php echo $c; ?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn text-white col-lg-12 py-2 shadow-lg register-button">
                            Create your account
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>