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
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">ITS</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Pre-Question <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Practice</a></li>
                <li><a href="#">Post-Question</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quan Do <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="admin.php">Admin CP</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Querries</a></li>
                        <li><a href="#">Past Questions</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Change Password</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
        hello
    </div><!-- /.container-fluid -->
</nav>
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
<footer class="footer">
    <div class="container">
        <p class="text-muted"> QuanDo &copy; 2015 RMIT</p>
    </div>
</footer>
<script>
    $('#feedback').rating({
        starCaptions: {1: 'Very Poor', 2: 'Poor', 3: 'Ok', 4: 'Good', 5: 'Very Good'}
    });

</script>
</body>
</html>