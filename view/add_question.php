<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 15/07/15
 * Time: 2:54 PM
 */

require_once('./controller/QuestionCtrl.php');
require_once('./model/Question.php');

//
//echo '<br><br><br><br>';
//foreach ($_POST as $key => $value) {
//    echo $key.': '.$value.'<br>';
//}

$type = $_POST['type'];

$cate = htmlspecialchars($_POST['cate']);
$point = htmlspecialchars($_POST['point']);
$title = htmlspecialchars($_POST['title']);
$explain = htmlspecialchars($_POST['explain']);

if ($type == 'add') {

    $q_tmp = new Question($cate, $point, $title, $explain);
    $qid = QuestionCtrl::addQuestion($q_tmp);

} else if ($type == 'update') {

    $qid = htmlspecialchars($_POST['qid']);
    $q_tmp = QuestionCtrl::get($qid);
    if ($title!='')
        $q_tmp->setTitle($title);
    if ($explain != '')
        $q_tmp->setExplain($explain);

    $q_tmp->setId($qid);
    QuestionCtrl::updateQuestion($q_tmp);

}

if ($qid > 0) {
    foreach ($_POST as $key => $value) {
        $param_name = 'o::';
        if (substr($key, 0, strlen($param_name)) == $param_name) {
            if (strlen($value) > 0) {
                echo $key.': '.$value.'<br>';
                $value = htmlspecialchars($value);
                $ktext = explode('::', $key)[1];
                $correct = $ktext == $_POST['correct'] ? 1 : 0;
                $o = new Option($qid, $value, $correct);

                if ($type == 'add')
                    QuestionCtrl::addOption($o);
                else if ($type == 'update') {
                    $o->setId(explode('::', $key)[2]);
                    QuestionCtrl::updateOption($o);
                }
            }
        }
    }

}


echo '<script>window.location.href="admin.php?p=0"</script>';