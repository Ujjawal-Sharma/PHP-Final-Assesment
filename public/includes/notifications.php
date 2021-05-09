 <!-- for wrong id pw -->
 <?php 
 if(isset($_SESSION['errors'])) {?>
    <div class="form-errors m-auto fade-in-down">
        <?php foreach($_SESSION['errors'] as $error) {?>
            <p class="text-white bg-danger ml-auto p-2 text-center"><?php echo $error ?></p>
        <?php } 
        $_SESSION['errors'] = array();?>
    </div>
    <?php } else {  $_SESSION['errors'] = array();} 
    
if(isset($_SESSION['success'])) {?>
<div class="form-errors m-auto data-mdb-animation-delay">
    <?php foreach($_SESSION['success'] as $success) {?>
        <p class="text-white bg-success ml-auto p-2 text-center"><?php echo $success ?></p>
    <?php } 
    $_SESSION['success'] = array();?>
</div>
    <?php } else {  $_SESSION['success'] = array();} ?>