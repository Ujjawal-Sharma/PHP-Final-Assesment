<?php
include_once '../classes/questionsTable.class.php';
include_once '../classes/categoriesTable.class.php';

$obj1 = new Categories();
$obj = new Questions();

$categories = $obj1->fetchAll();
$rows = $obj->fetchQuestionsForQ();
// foreach($rows as $row){
// // foreach($row as $r){
// echo "<pre>";
// print_r($row['id']);
// // }
// }
// die("here");
include_once 'header.php';
?>
<div class="container-fluid col-md-10"> 

<form action="../backend/uploadQuestionaire.php" method="POST">

<div class="row p-3">
    <div class="table-responsive">
        <table class="table table-striped table-sm text-center shadow-lg">
        <thead>
            <tr class="bg-dark text-white">
            <th scope="col">ID</th>
            <th scope="col">Question</th>
            <th scope="col">Category</th>
            <th scope="col">Type</th>
            <th scope="col" class="border-0">Select</th>
            </tr>
        </thead>
            <tbody>
                <?php foreach ($rows as $row) { ?>
                <tr class="border">
                    <?php foreach ($row as $r) { ?>
                                <td><?php echo $r ?></td>      
                    <?php } ?>
                    <td class="border-left-0 border-right-0 border-top-0">
                    <input class="form-check-input" type="checkbox" value="<?php echo $row['id']?>" id="" name="check_list[]">
                    </td>
                </tr>  
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row d-flex justify-content-center">
            <div class="input-group col-md-7">
                <select name="category" class="form-select form-control" required>
                    <option value="" disabled selected>Category</option>
                    <?php foreach($categories as $cat){
                            foreach($cat as $c) { ?>
                                <option value="<?php echo $c; ?>"><?php echo $c; ?></option>
                    <?php }} ?>
                </select>
            </div>
        </div>
<div class="row d-flex justify-content-center">
    <div class="d-flex justify-content-center py-4 col-md-12">
            <div class="input-group col-md-8 d-flex justify-content-center">
                <input id="time-input" type="text" class="form-control input-sm col-md-3 shadow" 
                 placeholder="Time limit(in minutes)" name="timelimit"/>
                 <input id="name-input" type="text" class="form-control input-sm col-md-5 shadow" 
                 placeholder="Enter name for this questionaire.." name="name"/>
                <span class="input-group-append">
                <button class="btn text-white btn-block shadow" type="submit" id="add-category-btn">Create Questionaire</button>
                </span>   
            </div>            
    </div>
</div>

</form>
</div>

<?php 
include_once 'footer.php';
?>