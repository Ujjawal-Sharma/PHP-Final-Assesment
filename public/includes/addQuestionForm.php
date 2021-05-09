<?php
include_once '../classes/categoriesTable.class.php';
$obj = new Categories();

$categories = $obj->fetchAll();
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

    $(function() {
        $('#colorselector').change(function(){
            $('.colors').hide();
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

    <form action="../backend/uploadQuestion.php" method="POST">
        <div class="row p-3 d-flex justify-content-center bg-light">
        <div class="input-group bg-light col-md-8">
            <label class="label text-white">Category:</label>
            </div>
            <div class="input-group col-md-8">
                <select name="category" class="form-select form-control" required>
                    <option value="" disabled selected>Category</option>
                    <?php foreach($categories as $cat){
                            foreach($cat as $c) { ?>
                                <option value="<?php echo $c; ?>"><?php echo $c; ?></option>
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
                class="form-control bg-white order-md" required></textarea>
            </div>
        </div>

        <div class="row p-3 d-flex justify-content-center bg-light">
        <div class="input-group bg-light col-md-8">
            <label class="label text-white">Type:</label>
            </div>
            <div class="input-group col-md-8">
                <select name="type" class="form-select form-control" id="type-selector" required>
                    <option value="" disabled selected>Type</option>
                    <option value="multiple" >Multiple Choice</option>
                    <option value="single" >Single Choice</option>
                    <option value="open" >Open Text</option>
                </select>
            </div>
        </div>
        
        <div id="multiple" class="options bg-light" style="display:none">
            <div class="row col-md-8 bg-light ml-auto mr-auto">
                <div class="input-group col bg-light">
                    <input id="option-1" type="text" name="option1" placeholder="Option-1" 
                    class="form-control bg-white order-md">
                </div>
                <div class="input-group col bg-light">
                    <input id="option-2" type="text" name="option2" placeholder="Option-2" 
                    class="form-control bg-white border-md" >
                </div>
                <div class="input-group col bg-light">
                    <input id="option-3" type="text" name="option3" placeholder="Option-3" 
                    class="form-control bg-white border-md" >
                </div>
                <div class="input-group col bg-light">
                    <input id="option-4" type="text" name="option4" placeholder="Option-4" 
                    class="form-control bg-white border-md">
                </div>
            </div>
        </div>
        
        <div class="row p-3 d-flex justify-content-center bg-light">
            <div id="single" class="options" style="display:none">
            <div class="row col-md-8 bg-light ml-auto mr-auto">
                <div class="input-group col bg-light">
                    <input id="option-1" type="text" name="option1" placeholder="Option-1" 
                    class="form-control bg-white order-md">
                </div>
                <div class="input-group col bg-light">
                    <input id="option-2" type="text" name="option2" placeholder="Option-2" 
                    class="form-control bg-white border-md" >
                </div>
                <div class="input-group col bg-light">
                    <input id="option-3" type="text" name="option3" placeholder="Option-3" 
                    class="form-control bg-white border-md" >
                </div>
                <div class="input-group col bg-light">
                    <input id="option-4" type="text" name="option4" placeholder="Option-4" 
                    class="form-control bg-white border-md">
                </div>
            </div>
            </div>
            <div id="open" class="options" style="display:none"></div>
        </div>

        <div class="row p-3 d-flex justify-content-center bg-light">
            <div class="input-group bg-light col-md-8">
                <label class="label text-white">Answer:</label>
            </div>
            <div class="input-group bg-light col-md-8">
                <input id="answer" type="text" name="answer" placeholder="Answer" 
                class="form-control bg-white border-md" required>
            </div>
        </div>
        <div class="row p-3 form-group col-lg-8 mx-auto mb-3">
            <button type="submit" class="btn  btn-block py-2 shadow" id="question-form-btn">Add Question</button>
        </div>
    </form>
</div>


<?php
include_once 'footer.php';
?>