<?php
include_once '../classes/questionsTable.class.php';
include_once '../classes/optionsTable.class.php';
include_once '../classes/categoriesTable.class.php';


include_once 'header.php';
?>

<div class="container bg-light py-4 my-4 col-md-8 shadow-lg border">

    <div class="d-flex justify-content-start mb-4">
        <a href="javascript:history.back()" class="btn btn-md text-dark back-btn"><i class="fas fa-arrow-left">&nbsp;</i></a>
    </div>
    <form enctype='multipart/form-data' action='../backend/uploadBulkOpCsv.php' method='post'>
		
        <label>Upload Options CSV file Here</label>
        
        <input size='50' type='file' name='filename'>
        </br>
        <input type='submit' name='submit' class="btn btn-primary" value='Upload Questions'>
        
        </form>
</div>


<?php
include_once 'footer.php';
?>