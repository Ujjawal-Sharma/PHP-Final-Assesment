<?php

?>

<nav class="d-flex flex-column p-3 text-white bg-dark col-sm-12 col-lg-2" style="width:220px;">
<div>
 
  <div class="d-flex align-items-center justify-content-center mt-3">
      <img src="../Storage/Images/demo.png" alt="image" width="80" height="180" class="rounded-circle">
</div>
  <div href="/" class="d-flex align-items-center justify-content-center mb-3 mt-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <h4><?php echo $_SESSION['username'] ?></h4>
</div>

  <div class="border-bottom w-100 mb-3 mt-4"></div>
  <ul class="nav nav-pills flex-column mb-auto">
  <?php if($_SESSION['isAdmin']) {?>
    <li class="nav-item">
      <a href="../views/adUsersTab.php?page=users" name="users" 
      class="nav-link text-white <?php if($_GET['page'] == 'users') echo 'active'?>">
      <i class="fas fa-users"></i>
        Users
      </a>
    </li>
    <li>
      <a href="../views/adPostsTab.php?page=posts" name="posts"
       class="nav-link text-white <?php if($_GET['page'] == 'posts') echo 'active'?>">
      <i class="far fa-newspaper"></i>
        Posts
      </a>
    </li>
    <li>
      <a href="../views/adEdProfileTab.php?page=profile" name="profile" 
      class="nav-link text-white <?php if($_GET['page'] == 'profile') echo 'active'?>">
      <i class="far fa-edit"></i>
      Edit Profile
      </a>
    </li>
  </ul>
    <?php } else {?>
    <li>
      <a href="../views/adEdProfileTab.php?page=profile" name="profile" 
      class="nav-link text-white active">
      <i class="far fa-edit"></i>
      Edit Profile
      </a>
    </li>

<?php } ?>
  </ul>
  <div class="border-bottom w-100 mt-3"></div>
</div>
</nav>