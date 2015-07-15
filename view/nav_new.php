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
                <li <?=$index?>><a href="?p=0"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                <li <?=$sur?>><a href="?p=4"><span class="glyphicon glyphicon-tasks"></span>Results</a></li>
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

<div class="container" style="margin-top: 80px;">
    <div class="row">
        <div class="row step text-center">
            <div id="index.php?p=1&c=1" class="st col-sm-offset-1 col-sm-2 <?=$p1?>">
                <span class="fa fa-flag-o"></span>
                <p>pre-test</p>
            </div>
            <div id="index.php?p=2" class="st col-sm-2 <?=$p2?>" <?=$p2_tg?>>
                <span class="fa fa-sitemap"></span>
                <p>practice</p>
            </div>
            <div id="index.php?p=1&c=2" class="st col-sm-2 <?=$p3?>" <?=$p3_tg?>>
                <span class="fa fa-flag-checkered"></span>
                <p>post-test</p>
            </div>
            <div id="index.php?p=4" class="st col-sm-2 <?=$p4?>" <?=$p4_tg?>>
                <span class="fa fa-pie-chart"></span>
                <p>survey</p>
            </div>
            <div id="index.php?p=5" class="st col-sm-2 <?=$p5?>" <?=$p5_tg?>>
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
        background-color: rgb(242, 255, 243);
        border: 1px solid rgb(175, 209, 174);
        border-right: none;

    }

    .disable-step, .disable-step:hover, .disable-step:active {
        color: rgb(133, 133, 133) !important;
        cursor: default !important;
        background-color: rgb(243, 243, 243) !important;
        border: 1px solid #D6D6D6;
        border-right: none;

    }

    .step {
        margin-top: 27px;
    }

    .step .col-sm-2 {

    }

    .step .col-sm-2:last-child {
        border: 1px solid #D6D6D6;
    }

    .step .col-sm-2:first-child {
        border-radius: 5px 0 0 5px;
    }

    .step .col-sm-2:last-child {
        border-radius: 0 5px 5px 0;
    }

    .step .col-sm-2:hover {
        color: #F58723;
        cursor: pointer;
    }

    .step .activestep {
        color: #ffffff;
        height: 100px;
        margin-top: -7px;
        padding-top: 7px;
        background-color: #005A00;
        vertical-align: central;
    }

    .step .fa {
        padding-top: 15px;
        font-size: 40px;
    }
</style>
