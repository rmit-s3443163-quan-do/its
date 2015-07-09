<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <link href="css/style.css" media="screen" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
require_once('view/nav.php');
?>
<div class="clear-top"></div>
<div class="container">
    <div class="jumbotron">
        <h1>Sequence Diagrams</h1>
        <p>It shows much the same information as a communication
            diagram, but they emphasise ordering.</p>
        <p><a class="btn btn-primary btn-lg" href="question1.php" role="button">Start test</a></p>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p class="text-muted"> QuanDo &copy; 2015 RMIT</p>
    </div>
</footer>
<script>
    $('.answer').click(function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            $(this).addClass('selected');
        }
    });

</script>
</body>
</html>