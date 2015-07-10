<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 9/07/15
 * Time: 12:28 PM
 */

    if (isset($_GET['p']) && $_GET['p']!='') {
        $page = $_GET['p'];
        switch ($page) {
            case '0':
                $index = 'class="active"';
                break;
            case '1':
                $pre = 'class="active"';
                break;
            case '2':
                $pra = 'class="active"';
                break;
            case '3':
                $pos = 'class="active"';
                break;
            case '4':
                $sur = 'class="active"';
                break;
        }
    } else {
        $index = 'class="active"';
    }
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
                <li <?=$index?>><a href="?p=0"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp; Home</a></li>
                <li <?=$pre?>><a href="?p=1"><span class="glyphicon glyphicon-import"></span>&nbsp;&nbsp; Pre-Question <span class="sr-only">(current)</span></a></li>
                <li <?=$pra?>><a href="?p=2"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;&nbsp; Practice</a></li>
                <li <?=$pos?>><a href="?p=3"><span class="glyphicon glyphicon-export"></span>&nbsp;&nbsp; Post-Question</a></li>
                <li <?=$sur?>><a href="?p=4"><span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp; Survey</a></li>
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