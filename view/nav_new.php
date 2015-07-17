<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 9/07/15
 * Time: 12:28 PM
 */

$p1 = 'available-step';
$p2 = $p3 = $p4 = $p5 = 'disable-step';

$p2_tg = 'data-toggle="tooltip" data-placement="bottom" title="Finish pre-test to unlock practice"';
$p3_tg = 'data-toggle="tooltip" data-placement="bottom" title="Finish practice to unlock post-test"';
$p4_tg = 'data-toggle="tooltip" data-placement="bottom" title="Finish post-test to unlock survey"';
$p5_tg = 'data-toggle="tooltip" data-placement="bottom" title="Finish survey to unlock results"';

if (UserCtrl::isDone(1)) {
    $p2 = 'available-step';
    $p2_tg = '';
}
if (UserCtrl::isDone(2)) {
    $p3 = 'available-step';
    $p3_tg = '';
}
if (UserCtrl::isDone(3)) {
    $p4 = 'available-step';
    $p4_tg = '';
}
if (UserCtrl::isDone(4)) {
    $p5 = 'available-step';
    $p5_tg = '';
}

if (isset($_GET['p']) && $_GET['p']!='') {
    $p = $_GET['p'];
    if ($p == 1) {
        if (isset($_GET['c']) && $_GET['c']!='') {
            $c = $_GET['c'];
            if ($c == 2)
                $p3 = 'activestep';
            else
                $p1 = 'activestep';
        }
        else
            $p1 = 'activestep';
    }
    if ($p==2 || $p==13)
        $p2 = 'activestep';
    if ($p==12) {
        $p1 = 'activestep';
        $p2 = 'available-step';
        $p2_tg = '';
    }
    if ($p == 13) {
        $p2 = 'activestep';
        $p3 = 'available-step';
        $p3_tg = '';
    }
    if ($p == 14) {
        $p3 = 'activestep';
        $p4 = 'available-step';
        $p4_tg = '';
    }
    if ($p == 4 || $p == 15)
        $p4 = 'activestep';
    if ($p == 5)
        $p5 = 'activestep';
    if ($p == 15) {
        $p5 = 'available-step';
        $p5_tg = '';
    }
}

?>

<nav class="navbar navbar-inverse navbar-fixed-top" style="display: none;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">ATS</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?=$index?>><a href="index.php?p=0"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                <li <?=$sur?>><a href="index.php?p=5"><span class="glyphicon glyphicon-tasks"></span>Results</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$_COOKIE['uid']?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="admin.php">Admin CP</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="change-password.php">Change Password</a></li>
                        <li><a href="login.php?a=logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container hidden-xs" style="margin-top: 50px;"></div>
<div class="container">
    <div class="row">
        <li class="user-dd dropdown">
            <div class="user dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <?=$_COOKIE['uid']?><span style="margin-left: 10px" class="glyphicon glyphicon-chevron-down"></span>
            </div>
            <ul class="dropdown-menu">
<!--                <li><a href="admin.php">Admin CP</a></li>-->
<!--                <li role="separator" class="divider"></li>-->
<!--                <li><a href="change-password.php">Change Password</a></li>-->
                <li><a href="login.php?a=logout">Logout</a></li>
            </ul>
        </li>
    </div>
    <div class="row">
        <div class="row step text-center">
            <div id="index.php?p=1&c=1" class="st col-xs-offset-1 col-xs-2 nav-step <?=$p1?>">
                <span class="fa fa-flag-o"></span>
                <p>pre-test</p>
            </div>
            <div id="index.php?p=2" class="st col-xs-2 nav-step <?=$p2?>" <?=$p2_tg?>>
                <span class="fa fa-sitemap"></span>
                <p>practice</p>
            </div>
            <div id="index.php?p=1&c=2" class="st col-xs-2 nav-step <?=$p3?>" <?=$p3_tg?>>
                <span class="fa fa-flag-checkered"></span>
                <p>post-test</p>
            </div>
            <div id="index.php?p=4" class="st col-xs-2 nav-step <?=$p4?>" <?=$p4_tg?>>
                <span class="fa fa-pie-chart"></span>
                <p>survey</p>
            </div>
            <div id="index.php?p=5" class="st col-xs-2 nav-step <?=$p5?>" <?=$p5_tg?>>
                <span class="fa fa-tasks"></span>
                <p>results</p>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<style>
    .available-step {
        background-color: rgb(50, 112, 145);
        /* border: 1px solid rgb(43, 128, 79); */
        border-right: 1px solid rgba(32, 143, 202, 0.69);
        color: gainsboro;
    }

    .disable-step, .disable-step:hover, .disable-step:active {
        color: rgb(51, 72, 94);
        cursor: default !important;
        background-color: rgba(65, 90, 115, 1);
        border-right: 1px solid rgb(51, 72, 94);
    }

    .step {
        margin-top: 35px;
        margin-bottom: 15px;
    }

    .step .nav-step {
        padding: 0;
        font-size: 14px;
    }

    .step .nav-step:last-child {
        /*border: 1px solid rgb(51, 72, 94);*/
    }

    .available-step:hover {
        color: white;
        background-color: rgb(55, 124, 161);
        cursor: pointer;
    }

    .activestep:hover {
        cursor: pointer;
    }

    .available-step + .activestep {
        /*border-right: none;*/
    }

    .activestep {
        color: #ffffff;
        height: 81px;
        margin-top: -3px;
        background-color: rgb(32, 143, 202);
        border-right: 5px solid rgb(0, 197, 255);
    }

    .nav-step p {
        overflow: hidden;
    }

    .step .fa {
        padding-top: 15px;
        font-size: 30px;
    }
</style>
