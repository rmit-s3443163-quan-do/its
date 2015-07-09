<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 9/07/15
 * Time: 12:28 PM
 */

?>
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
                <li id="index"><a href="index.php">Home</a></li>
                <li id="question1"><a href="question1.php">Pre-Question <span class="sr-only">(current)</span></a></li>
                <li id="practice"><a href="practice.php">Practice</a></li>
                <li><a href="question1.php">Post-Question</a></li>
                <li id="survey"><a href="survey.php">Survey</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$_COOKIE['uid']?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="admin.php">Admin CP</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Querries</a></li>
                        <li><a href="#">Past Questions</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="change-password.php">Change Password</a></li>
                        <li><a href="login.php?a=logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<script>
    var cl = location.pathname.split("/")[3].split(".")[0];
    $('#' + cl).addClass('active');
</script>