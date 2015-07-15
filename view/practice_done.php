<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 10/07/15
 * Time: 12:02 AM
 */


require_once('./controller/QuestionCtrl.php');
require_once('./controller/UserCtrl.php');


if (!UserCtrl::isDone(2)) {
    $uid = $_COOKIE['uid'];
    QuestionCtrl::submitTest(new Answers($uid, 3));
}

?>

<div class="clear-top"></div>
<div class="container">
<div class="jumbotron">
    <h2>Congrats!</h2>
    <p>Let's do some questions to see how better you are now xD.</p>
    <p><a class="btn btn-primary btn-lg" href="index.php?p=1&c=2" role="button">
            <span class="glyphicon glyphicon-chevron-right"></span>&nbsp;&nbsp; Do post-test</a></p>
</div>
</div>