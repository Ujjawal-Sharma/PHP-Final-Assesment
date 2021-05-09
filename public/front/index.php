<!DOCTYPE html>
<html>
<head>
<title>Blogger</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css?v=5">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function () {
    $("#login-btn").click(function () {
        $("#login-form").show();
    });
});

$(function () {
    $('input, select').on('focus', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
    });
    $('input, select').on('blur', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
    });
});

// Tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script type="text/javascript" src="../js/chatbox.js"></script>
</head>

<body class="bg-light">

<!-- NavBar -->
<?php
include_once '../includes/navBar.php'
?>

<?php
include_once '../includes/notifications.php';
?>

<?php
include_once '../includes/content.php'
?>


<?php
include_once '../includes/footer.php'
?>
