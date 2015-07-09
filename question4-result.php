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
    <div class="alert alert-danger" role="alert">
        <p><strong>Oh Snap!</strong> You got a wrong answer. Correct answer is B</p>
        <p><strong>Explain:</strong> Lorem ipsum dolor sit amet, eu pro consul fastidii deterruisset, et prima minimum duo, percipit lucilius an per.<br/>
            Ut tale dolore mel. Ea sit tacimates democritum, ex choro efficiendi sed, ut sea ridens dolorum disputationi. Vis te equidem nostrum, id mea suas ridens postulant.</p>
    </div>
    <h4><span class="label label-warning pull-left">Question 4 of 4:</span></h4><br/>
    <form action="index.php">
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>
                <p>Consider the communication diagram below:</p>
                <p><img src="./img/quiz5-qn3.jpg"/></p>
                <p>The above communication diagram is equivalent to which of the following sequence diagram?</p>
            </h4>
            <div class="col-xs-12 col-sm-6 answer panel panel-default">
                A. <img src="./img/quiz5-qn3-a.jpg"/> </div>
            <div class="col-xs-12 col-sm-6 answer panel panel-default">
                B. <img src="./img/quiz5-qn3-b.jpg"/></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 answer panel panel-default">
                C. <img src="./img/quiz5-qn3-c.jpg"/></div>
            <div class="col-xs-12 col-sm-6 answer panel panel-default incorrect">
                D. <img src="./img/quiz5-qn3-d.jpg"/></div>

            <p> How useful is this question?<br/>
            <input id="feedback" value="0" type="number" class="rating" min=0 max=5 step=1 data-size="sm">
            </p>

            <button type="submit" class="btn btn-primary">Back to Homepage</button>
        </div>
    </div>
    </form>
</div>
<?php
require_once('view/footer.php');
?>
<script>
    $('#feedback').rating({
        starCaptions: {1: 'Very Poor', 2: 'Poor', 3: 'Ok', 4: 'Good', 5: 'Very Good'}
    });

</script>
</body>
</html>