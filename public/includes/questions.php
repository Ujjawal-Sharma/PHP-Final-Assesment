<?php
include_once '../classes/questionsTable.class.php';
$obj = new Questions();

$rows = $obj->fetchQuestions();
// foreach($rows as $row)
// foreach($row as $r)
// print_r($r);
// die("here");
include_once 'header.php';
include_once 'notifications.php';
?>
<div class="container-fluid"> 
<div class="row p-3 table-cont">
    <div class="table-responsive">
        <table class="table table-striped table-sm text-center shadow">
        <thead>
            <tr class="bg-dark text-white">
            <th scope="col">ID</th>
            <th scope="col">Question</th>
            <th scope="col">Category</th>
            <th scope="col">Status</th>
            <th scope="col">Type</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th scope="col" class="border-0"></th>
            <th scope="col" class="border-0"></th>
            <th scope="col" class="border-0"></th>
            </tr>
        </thead>
            <tbody>
                <?php foreach ($rows as $row) { ?>
                <tr class="border">
                    <?php foreach ($row as $r) { ?>
                                <td><?php echo $r ?></td>      
                    <?php } ?>
                    <td class="border-left-0 border-right-0 border-top-0">
                        <a href="../includes/editQuestionForm.php?id=<?php echo $row['id'] ?>" 
                        class="btn btn-primary btn-sm shadow-lg rounded-circle"
                         data-toggle="tooltip" data-placement="top" title="Edit"> 
                         <i class="fas fa-pen"></i>
                        </a>
                    </td>
                    <td class="border-left-0 border-right-0">
                        <a href="../backend/banQuestion.php?id=<?php echo $row['id'] ?>" 
                        class="btn btn-danger btn-sm shadow-lg rounded-circle"
                        data-toggle="tooltip" data-placement="top" title="Block">
                        <i class="fas fa-ban"></i>
                        </a>
                    </td>
                    <td class="border-left-0 border-right-0">
                        <a href="../backend/unbanQuestion.php?id=<?php echo $row['id'] ?>" 
                        class="btn btn-success btn-sm shadow-lg rounded-circle"
                        data-toggle="tooltip" data-placement="top" title="Unblock">
                        <i class="fas fa-lock-open"></i>
                        </a>
                    </td>
                </tr>  
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</div>

<?php 
include_once 'footer.php';
?>