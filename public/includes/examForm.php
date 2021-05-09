<?php
include_once '../classes/questionaireTable.class.php';
include_once '../classes/questionsTable.class.php';
include_once '../classes/optionsTable.class.php';
include_once 'header.php';

$obj = new Questionaire();
$obj2 = new Questions();
$obj3 = new Options();

$name = $_GET['name']; 
$rows = $obj->fetchAllQuesIdTime($name);
// $count1 = $obj->fetchTotalQues($name);
$count1 = 0;
// $count2 = 0;
foreach($rows as $row) {
    $ret = $obj2->fetchSingleQuestion($row['ques_id']);
    if($ret['type'] === 'open')
    $count1 = $count1 + 1;
}

?>

<script>
$(document).ready(function(){
    var timelimit = $("#timelimit").attr("name")
    var timelimit = timelimit * 60;
    CountDown(timelimit,$('#display'));
});

 function CountDown(duration, display) {
            if (!isNaN(duration)) {
                var timer = duration, minutes, seconds;
                
              var interVal=  setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    $(display).html("<b>" + minutes + "m : " + seconds + "s" + "</b>");
                    if (--timer < 0) {
                        timer = duration;
                       SubmitFunction();
                       $('#display').empty();
                       clearInterval(interVal)
                    }
                    },1000);
            }
        }
        
function SubmitFunction() {
    $("#form").submit();
    console.log("here");
}

         //CountDown(30,$('#display'));
</script>



<div class="container bg-light py-4 my-4 col-md-8 shadow-lg border">
    <div class="row p-3 d-flex justify-content-center bg-light">
       <h3 class="text-danger" id="display"></h3>
    </div>
    <form action="../backend/uploadExamUser.php?count=<?php echo $count1;?>&questionaire=<?php echo $name; ?>" method="POST" id="form">
        <div class="row p-3 d-flex justify-content-center bg-light">
            <div class="row p-3 d-flex  bg-light">
                <div class="input-group bg-light col-md-12">
                    <ol>
<?php 

$ques_ids = array();
$open = 0;

foreach($rows as $row) {

    $ret = $obj2->fetchSingleQuestion($row['ques_id']);
    $question = $ret['question'];
    $type = $ret['type']; 
    if($type === 'multiple' || $type === 'single')
    $count1 = $count1 * 4;
    $timelimit = $row['timelimit'];?>

        <li class="label text-dark bg-warning border p-2" id="timelimit" name="<?php echo $timelimit ;?>"><?php echo " ".$question; ?></li>

        <?php  if($type === 'open') {?>
        <div class="input-group bg-light col-md-12 p-2 mb-3">
                <input name="<?php  echo "ans".$open;?>" type="text"  placeholder="Answer" 
                class="form-control bg-white border-md" required>
        </div>
        <?php $open = $open + 1;} elseif($type === 'multiple') {?>
            <div class="mb-3">
        <?php 
            $options = $obj3->fetchOptions($row['ques_id']);
            foreach($options as $opt) { ?>
                    <div class="row col-md-8 bg-light py-1">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value=" <?php echo $opt['option'] ?>" name="check_list[]">
                            <label class="form-check-label" for="flexRadioDefault1">
                                <?php echo $opt['option'] ?>
                            </label>
                        </div>
                    </div> 
<?php
    // echo "<pre>";
        }   
        echo "</div>";         
    }   elseif($type === 'single') {?>
        <div class="mb-3">
    <?php 
        $options = $obj3->fetchOptions($row['ques_id']);
        foreach($options as $opt) { ?>
                <div class="row col-md-8 bg-light py-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio"  name="radio" value="<?php echo $opt['option'] ?>">
                        <label class="form-check-label" for="flexRadioDefault1">
                            <?php echo $opt['option'] ?>
                        </label>
                    </div>
                </div>
<?php
// echo "<pre>";
 }   
    echo "</div>";         
}    // print_r($ret);
}  ?>

</ol>
    </div>
    <div class="row form-group col-lg-8 mx-auto">
            <button type="submit" class="btn  btn-block shadow"  id="question-form-btn">Submit</button>
    </div>


</form>
</div>
</div>
</div>
<?php 
include_once 'footer.php';
?>

