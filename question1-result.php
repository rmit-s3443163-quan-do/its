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
<!---->
<!--    <div class="jumbotron">-->
<!--        <h1>Sequence Diagrams</h1>-->
<!--        <p>It shows much the same information as a communication-->
<!--            diagram, but they emphasise ordering.</p>-->
<!--        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>-->
<!--    </div>-->
    <div class="alert alert-success" role="alert">
        <p><strong>Well Done!</strong> You got your answer (D) correct.</p>
        <p><strong>Explain:</strong> Lorem ipsum dolor sit amet, eu pro consul fastidii deterruisset, et prima minimum duo, percipit lucilius an per.<br/>
        Ut tale dolore mel. Ea sit tacimates democritum, ex choro efficiendi sed, ut sea ridens dolorum disputationi. Vis te equidem nostrum, id mea suas ridens postulant.</p>
    </div>

    <h4><span class="label label-warning pull-left">Question 1 of 4:</span></h4><br/>

    <form action="question2.php">
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>A good OO design should aim for:</h4>
            <div class="answer panel panel-default">
                A. Low coupling and Low Cohesion</div>
            <div class="answer panel panel-default">
                B. High coupling and High Cohesion</div>
            <div class="answer panel panel-default">
                C. High Coupling and Low Cohesion</div>
            <div class="answer panel panel-default correct">
                D. Low Coupling and High Cohesion</div>
            <p> How useful is this question?<br/>
                <input id="feedback" value="0" type="number" class="rating" min=0 max=5 step=1 data-size="sm">
            </p>
            <button type="submit" class="btn btn-primary">Next Question</button>
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