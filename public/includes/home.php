<?php 
include_once '../classes/questionaireTable.class.php';
include_once '../classes/interestsTable.class.php';
include_once '../classes/categoriesTable.class.php';

$obj = new Questionaire();
$obj1 = new Interests();
$obj2 = new Categories();

$interest = $obj1->fetchInterest($_SESSION['id']);
$interest = $interest['name'];

$categories = $obj2->fetchAll();

$rows = $obj->fetchAllQuestionaires($interest); ?>
<div class="container" style="display:none;" id="home">
<?php if($_SESSION['isAdmin'] ==='Admin') {
?>

<form action="../backend/uploadCategory.php" method="POST">
    <div class="row p-4 d-flex justify-content-center my-2"> 
    <div class="input-group col-md-8 d-flex justify-content-center">
        <input id="category-input" type="text" class="form-control input-sm col-md-8 shadow" 
        placeholder="Add new category..." name="category"/>
        <span class="input-group-append">
        <button class="btn text-white shadow" type="submit" id="add-category-btn">
            <i class="fas fa-plus-square"></i></button>
        </span>
    </div>
    </div>
</form>


<div class="container p-2 flex-box mb-4 justify-content-center">
        <div id="cards_landscape_wrap-2">
    <div class="row">
        <?php foreach ($categories as $cat) {
            ?>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="card-flyer">
                        <div class="text-box">
                            <div class="text-container">
                                <p class="" style="color:purple;"><?php echo $cat['category'] ?></p>
                            </div>
                        </div>
                    </div>
            </div>
        <?php  } ?>
    </div>
    </div>
</div>

<?php

} else { ?>
<div class="container p-2 flex-box mb-3 justify-content-center">
        <div id="cards_landscape_wrap-2">
    <div class="row">
        <?php foreach ($rows as $r) {
            ?>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <a href="../includes/examForm.php?name=<?php echo $r['name'] ?>">
                    <div class="card-flyer bg-white">
                        <div class="text-box">
                            <div class="text-container">
                                <h6 class="text-danger"><?php echo $r['name'] ?></h6>
                                <small class="text-dark">Click to start test</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php  } ?>
    </div>
    </div>
</div>
<?php
} ?>

</div>
