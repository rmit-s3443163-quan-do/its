<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 10/07/15
 * Time: 12:02 AM
 */


require_once('./controller/QuestionCtrl.php');
require_once('./controller/SurveyCtrl.php');
require_once('./controller/UserCtrl.php');

$uid = $_COOKIE['uid'];

foreach ($_POST as $key => $value) {

    $param_name = 'r::';
    if (substr($key, 0, strlen($param_name)) == $param_name) {
        $sid = explode('::',$key)[1];
        if (isset($_POST['c::'.$sid]) && $_POST['c::'.$sid] != '')
            $comment = $_POST['c::' . $sid];
        else
            $comment = '';
        $vote = new Vote($sid, $uid, $value, $comment);
        SurveyCtrl::vote($vote);
    }
}

if (!UserCtrl::isDone(4))
    QuestionCtrl::submitTest(new Answers($uid, 4));

?>

<div class="clear-top hidden-xs"></div>
<div class="container">
<div class="jumbotron">
    <h2>Thanks a lot xD</h2>
    <p>You can finally check your results now.</p>
    <p><a class="btn btn-primary btn-lg" href="index.php?p=5" role="button">
            <span class="glyphicon glyphicon-chevron-right"></span>&nbsp;&nbsp; View Results</a>
    </p>
</div>
</div>