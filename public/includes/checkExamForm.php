<?php
include_once '../classes/questionaireTable.class.php';
include_once '../classes/questionsTable.class.php';
include_once '../classes/solutionsbyuserTable.class.php';
include_once '../classes/examsbyuserTable.class.php';
include_once 'header.php';

$obj = new Questionaire();
$obj2 = new Questions();
$obj3 = new Solutionsbyuser();
$obj4 = new Examsbyuser();

$id = $_GET['id']; 

$name = $obj4->fetchName($id);

$rows = $obj->fetchAllQuesIdTime($name);
// $count1 = $obj->fetchTotalQues($name);

$opensol = $obj3->fetchOpenSolution();
$singlesol = $obj3->fetchSingleSolution();
$multiplesol = $obj3->fetchMultipleSolution();
//print_r($rows);
// echo "<br>";
// print_r($singlesol);
// echo "<br>";
// print_r($multiplesol);
//die("here");
?>

<div class="container bg-light py-4 my-4 col-md-8 shadow-lg border">
<div class="d-flex justify-content-start mb-4">
        <a href="javascript:history.back()" class="btn btn-md text-dark back-btn"><i class="fas fa-arrow-left">&nbsp;</i></a>
    </div>
    <form action="../backend/markChecked.php?id=<?php echo $id;?>" method="POST">
        <div class="row p-3 d-flex justify-content-center bg-light">
            <div class="row p-3 d-flex bg-light col-md-12">
                <div class="input-group bg-light col-md-12">
                    <ol>
<?php 

$ques_ids = array();
$open = 0;
$radio = 0;
foreach($rows as $row) {

    $ret = $obj2->fetchSingleQuestion($row['ques_id']);
    $question = $ret['question'];
    $type = $ret['type']; 

?>

        <li class="label text-dark border mb-2"><?php echo " ".$question; ?></li>

        <?php  if($type === 'open') {?>
            <div class="input-group bg-light col-md-12">
            <label class="label text-primary"><?php  echo "Ans: ".$opensol[$open]['solution']; ?></label>
            </div>
            <div class="input-group bg-light col-md-12">
            <input class="form-check-input" type="radio" name="<?php  echo "radio".$radio;?>" value="Incorrect">
            <label class="form-check-label">Incorrect</label>
            </div>
            <div class="input-group bg-light col-md-12">
            <input class="form-check-input" type="radio"  name="radio1" value="Correct">
            <label class="form-check-label">Correct</label>
            </div>
            <br>
        <?php $open = $open + 1;
        $radio = $radio + 1;
        
        } elseif($type === 'multiple') {?>
         <?php 
            foreach($multiplesol as $multi) { ?>
                    <div class="input-group bg-light col-md-12">
                    <label class="label text-primary"><?php  echo "Ans: ".$multi['solution']; ?></label>
                    </div> 
<?php
        }   ?>
            <div class="input-group bg-light col-md-12">
            <input class="form-check-input" type="radio" name="<?php  echo "radio".$radio;?>" value="Incorrect">
            <label class="form-check-label">Incorrect</label>
            </div>
            <div class="input-group bg-light col-md-12">
            <input class="form-check-input" type="radio"  name="<?php  echo "radio".$radio;?>" value="Correct">
            <label class="form-check-label">Correct</label>
            </div>    
            <br> 
  <?php $radio = $radio + 1; }   elseif($type === 'single') {?>
        <div class="input-group bg-light col-md-12">
        <label class="label text-primary"><?php  echo "Ans: ".$singlesol[0]['solution']; ?></label>
        </div>
            <div class="input-group bg-light col-md-12">
            <input class="form-check-input" type="radio" name="<?php  echo "radio".$radio;?>" value="Incorrect">
            <label class="form-check-label">Incorrect</label>
            </div>
            <div class="input-group bg-light col-md-12">
            <input class="form-check-input" type="radio"  name="<?php  echo "radio".$radio;?>" value="Correct">
            <label class="form-check-label">Correct</label>
            </div>
            <br>
<?php $radio = $radio + 1;
// echo "<pre>";
 }   
        
}    // print_r($ret);?>
 

</ol>
    </div>
    <div class="row form-group col-lg-8 mx-auto">
            <button type="submit" class="btn shadow col-md-10"  id="question-form-btn">Submit</button>
    </div>


</form>
</div>
</div>
</div>
<?php 
include_once 'footer.php';
?>

