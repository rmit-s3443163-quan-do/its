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
    if ($key == 'title') {
        SurveyCtrl::add($value);
        echo 'okkkk';
    }
}
