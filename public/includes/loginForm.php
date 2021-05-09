<div class="container" style="display:block;" id="login-form">
    <div class="row py-1 mt-2 align-items-center"> 
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="../Storage/Images/cover.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
        </div>
        <div class="card col-lg-4 ml-auto mb-3 mt-3 p-5 align-middle shadow bg-light" >

        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
            <div class="border-bottom w-100 ml-5"></div>
                <span class="px-2 font-weight-bold login-heading">EasyLogIn</span>
            <div class="border-bottom w-100 mr-5"></div>
        </div>
            <form action="../backend/login.php" class="was-validated" method="POST">
            <div class="form-group">
                <!-- <label for="uname">Email:</label> -->
                <input type="text" class="form-control" id="uname" placeholder="Enter email" name="email" 
                value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" required>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <!-- <label for="pwd">Password:</label> -->
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" 
                value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" required> <small>Remember me</small>
                <div class="invalid-feedback">Check this checkbox to continue.</div>
                </label>
            </div>
            <div class="w">
            <button type="submit" class="btn text-white col-lg-12 shadow-lg login-button">Login</button>
            </div>
            </form>
        </div>
    </div>
</div>