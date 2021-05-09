<?php
include_once '../classes/questionsTable.class.php';
include_once '../classes/optionsTable.class.php';
include_once '../classes/categoriesTable.class.php';

$obj3 = new Categories();
$obj = new Questions();
$obj2 = new Options();

$id=$_GET['id'];

$categories = $obj3->fetchAll();
$result = $obj->fetchSingleQuestion($id);
$options = $obj2->fetchOptions($id);

$question = $result['question'];
$category = $result['category'];
$type = $result['type'];
$answer = $result['answer'];

$option = array();

foreach($options as $opt) {
    foreach($opt as $op) {
        array_push($option, $op);
       // print_r($op);
        
    }
}

$option1 = $option[0];
$option2 = $option[1];
$option3 = $option[2];
$option4 = $option[3];

include_once 'header.php';
?>
<script>
$(document).ready(function(){
$(function() {
        $('#type-selector').change(function(){
            $('.options').hide();
            $('#' + $(this).val()).show();
        });
    });
});
</script>

<div class="container bg-light py-4 my-4 col-md-8 shadow-lg border">

    <div class="d-flex justify-content-start mb-4">
        <a href="javascript:history.back()" class="btn btn-md text-dark back-btn"><i class="fas fa-arrow-left">&nbsp;</i></a>
    </div>
    <div class="row p-3 d-flex justify-content-center bg-light">
       <h3 class="text-danger">Question Details</h3>
    </div>

    <form action="../backend/updateQuestion.php?id=<?php echo $id;?>" method="POST">
        <div class="row p-3 d-flex justify-content-center bg-light">
        <div class="input-group bg-light col-md-8">
            <label class="label text-white">Category:</label>
            </div>
            <div class="input-group col-md-8">
                <select name="category" class="form-select form-control" required>
                    <option value="" disabled selected>Category</option>
                    <?php foreach($categories as $cat){
                            foreach($cat as $c) { ?>
                                <option value="<?php echo $c; ?>"
                                 <?php if ($category == $c) echo ' selected="selected"'; ?>><?php echo $c; ?></option>
                    <?php }} ?>
                </select>
            </div>
        </div>

        <div class="row p-3 d-flex justify-content-center bg-light">
            <div class="input-group bg-light col-md-8">
            <label class="label text-white">Question:</label>
            </div>
            <div class="input-group bg-light col-md-8">
                <textarea id="question" name="question"
                class="form-control bg-white order-md" required><?php echo $question ?></textarea>
            </div>
        </div>

        <div class="row p-3 d-flex justify-content-center bg-light">
        <div class="input-group bg-light col-md-8">
            <label class="label text-white">Type:</label>
            </div>
            <div class="input-group col-md-8">
                <select name="type" class="form-select form-control" id="type-selector" required>
                    <option value="" disabled selected>Type</option>
                    <option value="multiple" <?php if ($type == 'multiple') echo ' selected="selected"'; ?>>Multiple Choice</option>
                    <option value="single" <?php if ($type == 'single') echo ' selected="selected"'; ?>>Single Choice</option>
                    <option value="open" <?php if ($type == 'open') echo ' selected="selected"'; ?>>Open Text</option>
                </select>
            </div>
        </div>
        
        <div id="multiple" class="options bg-light" <?php if($type != 'multiple') echo "style=\"display:none\""?>>
            <div class="row col-md-8 bg-light ml-auto mr-auto">
                <div class="input-group col bg-light">
                    <input id="option-1" type="text" name="option1" placeholder="Option-1" 
                    class="form-control bg-white order-md" value="<?php echo $option1; ?>">
                </div>
                <div class="input-group col bg-light">
                    <input id="option-2" type="text" name="option2" placeholder="Option-2" 
                    class="form-control bg-white border-md" value="<?php echo $option2; ?>">
                </div>
                <div class="input-group col bg-light">
                    <input id="option-3" type="text" name="option3" placeholder="Option-3" 
                    class="form-control bg-white border-md" value="<?php echo $option3; ?>">
                </div>
                <div class="input-group col bg-light">
                    <input id="option-4" type="text" name="option4" placeholder="Option-4" 
                    class="form-control bg-white border-md" value="<?php echo $option4; ?>">
                </div>
            </div>
        </div>

        <div id="multiple" class="options bg-light" <?php if($type != 'single') echo "style=\"display:none\""?>>
            <div class="row col-md-8 bg-light ml-auto mr-auto">
                <div class="input-group col bg-light">
                    <input id="option-1" type="text" name="option1" placeholder="Option-1" 
                    class="form-control bg-white order-md" value="<?php echo $option1; ?>">
                </div>
                <div class="input-group col bg-light">
                    <input id="option-2" type="text" name="option2" placeholder="Option-2" 
                    class="form-control bg-white border-md" value="<?php echo $option2; ?>">
                </div>
                <div class="input-group col bg-light">
                    <input id="option-3" type="text" name="option3" placeholder="Option-3" 
                    class="form-control bg-white border-md" value="<?php echo $option3; ?>">
                </div>
                <div class="input-group col bg-light">
                    <input id="option-4" type="text" name="option4" placeholder="Option-4" 
                    class="form-control bg-white border-md" value="<?php echo $option4; ?>">
                </div>
            </div>
        </div>
        
        <div class="row p-3 d-flex justify-content-center bg-light">
            <div id="single" class="options" style="display:none"></div>
            <div id="open" class="options" style="display:none"></div>
        </div>

        <div class="row p-3 d-flex justify-content-center bg-light">
            <div class="input-group bg-light col-md-8">
                <label class="label text-white">Answer:</label>
            </div>
            <div class="input-group bg-light col-md-8">
                <input id="answer" type="text" name="answer" placeholder="Answer" 
                class="form-control bg-white order-md" value="<?php echo $answer?>" required>
            </div>
        </div>
        <div class="row p-3 form-group col-lg-8 mx-auto mb-3">
            <button type="submit" class="btn  btn-block py-2 shadow" id="question-form-btn">Update Question</button>
        </div>
    </form>
</div>


<?php
include_once 'footer.php';
?>