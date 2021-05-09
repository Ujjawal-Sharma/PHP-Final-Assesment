<?php 
session_start();

?>
<script>
$(document).ready(function(){
  $("#home").show();
$("#login-btn").click(function(){
    $("#login-form").show();
    $("#register-form").hide();
});
$("#register-btn").click(function(){
    $("#login-form").hide();
    $("#register-form").show();
});
$("#profile-btn").click(function(){
    $("#chatbox").hide();
    $("#userstab").hide();
    $("#home").hide();
    $("#profile").show();
});
$("#chatbox-btn").click(function(){
    $("#profile").hide();
    $("#userstab").hide();
    $("#home").hide();
    $("#chatbox").show();
});
$("#userstab-btn").click(function(){
    $("#profile").hide();
    $("#chatbox").hide();
    $("#home").hide();
    $("#userstab").show();
});

});


</script>
<nav class="navbar navbar-expand-sm navbar-light text-white p-2 nav">
  
    <a class="ml-4 text-white btn" href="../front/index.php" style="font-size:25px;">
    <i class="fab fa-etsy"></i> •&nbsp;<small>xamEasy</small></a>

  <?php if(isset($_SESSION['login'])) { ?>

    <div class="ml-auto mr-3">
      <div class="dropdown">
        <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" 
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle"></i>
        &nbsp;<?php echo $_SESSION['username'];?>
        </button>
      <div class="dropdown-menu dropdown-menu-right text-center shadow" style="border-radius: 4%;">
        <button class="dropdown-item btn" id="profile-btn">Profile&nbsp; <i class="fas fa-cog"></i></button>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item btn" id="chatbox-btn">Chat&nbsp; <i class="fas fa-comments"></i></button>
        <?php if($_SESSION['isAdmin'] === 'Admin') {?>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item btn" id="userstab-btn">Users&nbsp; <i class="fas fa-users"></i></button>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item btn" href="../includes/addQuestionForm.php" id="addQuestion-btn">Add Question&nbsp; <i class="fas fa-code"></i></button>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item btn" href="../includes/questions.php" id="addQuestion-btn">All Questions&nbsp; <i class="fas fa-users"></i></a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item btn" href="../includes/questionsForQuestionaire.php" id="makeQuestionaire-btn">Make Questionaire&nbsp; <i class="fas fa-users"></i></a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item btn" href="../includes/exambyuserForm.php" id="listexam-btn">Exams by user&nbsp; <i class="far fa-clipboard"></i></a> 
        <div class="dropdown-divider"></div>
        <a class="dropdown-item btn" href="../includes/bulkquestionForm.php" id="bulkquestion-btn">Upload Bulk Questions&nbsp; <i class="fas fa-cloud-upload-alt"></i></a>   
        <?php  } ?>
        <?php if($_SESSION['isAdmin'] === 'Author') {?>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item btn" href="../includes/listofexamsbyuser.php" id="listexam-btn">Exams Attempted&nbsp; <i class="far fa-clipboard"></i></i></a>
        <?php  } ?>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../backend/logout.php">Logout &nbsp; <i class="fas fa-sign-out-alt"></i></a>
      </div>
      </div>
      <!-- <a class="text-white btn" href="#"></a> -->
    </div>
  <?php 
  } else { ?>
  <div class="ml-auto mr-3">
      <div class="dropdown">
        <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Login / Register
        </button>
      <div class="dropdown-menu dropdown-menu-right text-center shadow" style="border-radius: 4%;">
        <button class="dropdown-item btn" id="login-btn">Login&nbsp; <i class="fas fa-sign-in-alt"></i></button>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item btn" id="register-btn">Register&nbsp; <i class="fas fa-user-plus"></i></button>
      </div>
      </div>
      <!-- <a class="text-white btn" href="#"></a> -->
    </div>
  <?php }
  ?>
</nav>