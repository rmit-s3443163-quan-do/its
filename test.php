<?php

require_once('controller/QuestionCtrl.php');

QuestionCtrl::init();

echo QuestionCtrl::getJSON(12312);