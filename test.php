<?php

require_once('./controller/QuestionCtrl.php');
require_once('./model/Question.php');
require_once('./model/Option.php');

//$q = new Question(1, 1, 1, 1, 'Sequence diagrams are best suited for:', 'Thu ti thoi explain cai gi de luc khac!!!');
//
//if (QuestionCtrl::addQuestion($q))
//    echo 'success';
//else
//    echo'fail';

//
//QuestionCtrl::addOption(new Option(2,'Low coupling and Low Cohesion',false));
//QuestionCtrl::addOption(new Option(2,'High coupling and High Cohesion',false));
//QuestionCtrl::addOption(new Option(2,'High Coupling and Low Cohesion',false));
//QuestionCtrl::addOption(new Option(2,'Low Coupling and High Cohesion',true));

//$arr = QuestionCtrl::getQuestionsByCategory(1);
//
//foreach ($arr as $q) {
//    echo $q['id']. ' - '. $q['title'] . '<br>';
//    $opts = QuestionCtrl::getOptionsByID($q['id']);
//
//    foreach ($opts as $o) {
//        echo $o['id'] . ' - ' . $o['title'] . ' - ' . $o['isCorrect'] . '<br>';
//    }
//    echo '<br>';
//}

echo QuestionCtrl::getLastID();

?>

<!--<h2>POST DATA</h2>-->
<!--<pre>-->
<?php //print_r($_POST); ?>
<!--</pre>-->
<!--<pre>-->
<?php //echo htmlspecialchars($_POST['opt4']); ?>
<!--</pre>-->