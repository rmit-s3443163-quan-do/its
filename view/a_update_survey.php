<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 15/07/15
 * Time: 2:54 PM
 */

require_once('./controller/SurveyCtrl.php');
require_once('./model/Survey.php');

//echo '<br><br><br><br>';
foreach ($_POST as $key => $value) {
//    echo $key.': '.$value.'<br>';
    if ($key == 'id') {
        $title = $_POST['title'];
        $show = $_POST['show']=='on'?1:0;

        $s = new Survey($title);
        $s->setShow($show);
        $s->setId($value);

        SurveyCtrl::update($s);
        echo 'okkkk';
    }
}
