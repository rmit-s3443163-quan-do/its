<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 15/07/15
 * Time: 2:54 PM
 */

require_once('./controller/QuestionCtrl.php');

$uid = $_COOKIE['uid'];
$c = $_POST['c'];

$answers = new Answers($uid, $c);

foreach($_POST as $key => $value) {
    $param_name = 'ans::';
    if(substr($key, 0, strlen($param_name)) == $param_name) {
        $ques = explode('_',$value)[0];
        $ans = explode('_',$value)[1];

        $answers->addAns(new Answer($ques, $ans));
    }
}

QuestionCtrl::submitTest($answers);

echo 'okkkk';