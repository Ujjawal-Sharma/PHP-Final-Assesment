<?php
include_once '../classes/examsbyuserTable.class.php';
session_start();
$obj = new Examsbyuser();



$rows = $obj->fetchAllExams($_SESSION['id']);
// foreach($rows as $row){
// // foreach($row as $r){
// echo "<pre>";
// print_r($row['id']);
// // }
// }
// print_r($rows);
// die("here");
include_once 'header.php';
?>
<div class="container-fluid col-md-10"> 

<div class="d-flex justify-content-start mb-4 mx-6 col-md-6">
        <a href="javascript:history.back()" class="btn btn-md text-dark back-btn"><i class="fas fa-arrow-left">&nbsp;</i></a>
    </div>
<div class="row p-3">
    <div class="table-responsive">
        <table class="table table-striped table-sm text-center shadow-lg">
        <thead>
            <tr class="bg-dark text-white">
            <th scope="col">ID</th>
            <th scope="col">Exam Name</th>
            <th scope="col">Status</th>
            <th scope="col">Submitted At</th>
            <th scope="col">Checked At</th>
            </tr>
        </thead>
            <tbody>
                <?php foreach ($rows as $row) { ?>
                <tr class="border">
                    <?php foreach ($row as $r) { ?>
                                <td><?php echo $r ?></td>      
                    <?php } ?>
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