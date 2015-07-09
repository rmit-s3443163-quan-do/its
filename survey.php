<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="./js/star-rating.js" type="text/javascript"></script>

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
        <h1>ITS Survey</h1>
        <p>Help us make it better by answering these questions below:</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">View Result</a></p>
    </div>
    <form action="#">
        <h4><span class="label label-warning pull-left">Question 1 of 5:</span></h4><br/>
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>ITS required me to review my course materials regularly:</h4>
                <input value="0" type="number" class="rating" min=0 max=5 step=1 data-size="sm">
            </div>
        </div>
        <h4><span class="label label-warning pull-left">Question 2 of 5:</span></h4><br/>
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>ITS helped me to do well in the weekly tests:</h4>
                <input value="0" type="number" class="rating" min=0 max=5 step=1 data-size="sm">
            </div>
        </div>
        <h4><span class="label label-warning pull-left">Question 3 of 5:</span></h4><br/>
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>I spent on average 15 minutes or more on ITS each week (from week 4):</h4>
                <input value="0" type="number" class="rating" min=0 max=5 step=1 data-size="sm">
            </div>
        </div>
        <h4><span class="label label-warning pull-left">Question 4 of 5:</span></h4><br/>
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>The option to view questions by topics was useful:</h4>
                <input value="0" type="number" class="rating" min=0 max=5 step=1 data-size="sm">
            </div>
        </div>
        <h4><span class="label label-warning pull-left">Question 5 of 5:</span></h4><br/>
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>The option to raise queries and getting feedback was useful:</h4>
                <input value="0" type="number" class="rating" min=0 max=5 step=1 data-size="sm">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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
    $('.rating').rating({
        starCaptions: {1: 'Strongly Disagree', 2: 'Disagree', 3: 'Neutral', 4: 'Agree', 5: 'Strongly Agree'}
    });
</script>
</body>
</html>