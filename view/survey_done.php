<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 10/07/15
 * Time: 12:02 AM
 */

require_once('./controller/QuestionCtrl.php');
require_once('./controller/UserCtrl.php');


if (!UserCtrl::isDone(4)) {
    $uid = $_COOKIE['uid'];
    QuestionCtrl::submitTest(new Answers($uid, 4));
}

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