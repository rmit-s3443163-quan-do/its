<?php

require_once('controller/QuestionCtrl.php');

QuestionCtrl::init();

if (QuestionCtrl::check(1,'D,B,'))
    echo 'correct';
else
    echo 'incorrect';