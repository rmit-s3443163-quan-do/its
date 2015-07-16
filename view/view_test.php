<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 10/07/15
 * Time: 12:02 AM
 */

require_once('./controller/QuestionCtrl.php');

$done4 = QuestionCtrl::isDone(4);

$c = 1;

if (isset($_GET['c']) && $_GET['c']!='') {
    $c = $_GET['c'];
    if ($c != 1 && $c!=2)
        $c = 1;
}

$arr = QuestionCtrl::getRes($c);

$total=0;
$mark=0;
$correct=0;

foreach ($arr as $p) {
    $total += $p->getPoint();
    $mark += $p->getMark();
    if ($p->getMark()>0)
        $correct++;
}

$q_arr = QuestionCtrl::getQuestionsByCategory($c);

$type = 'Pre-Test Result';
if ($c == 2)
    $type = 'Post-Test Result';
?>

<div class="clear-top hidden-xs"></div>
<div class="container">
    <ol class="breadcrumb" style="margin-bottom: 40px;">
        <li><a href="index.php">Home</a></li>
        <li class="active"><?=$type?></li>
    </ol>
    <?php if (!$done4) { ?>
    <div class="alert alert-info">
        <span class="glyphicon glyphicon-info-sign"></span> Your result is being marked..
    </div>
    <?php };
    foreach($q_arr as $ques=>$q) {
        $selected = false;
        ?>
    <h4><span class="label label-warning pull-left">Question <?=$ques+1?> of <?=count($q_arr)?> </span></h4><br/>
    <div class="panel panel-default">
        <div class="panel-body">
            <h4 class="survey-title"><?=htmlspecialchars_decode($q->getTitle())?> </h4>
            <?php foreach($q->getOpts() as $opt=>$o) {
                if ($arr[$ques]->getKtext() != '-')
                    $selected = true;

                if ($arr[$ques]->getKtext() == QuestionCtrl::getKText($opt)) {
                    if ($done4)
                        $type = $arr[$ques]->getRes();
                    else
                        $type = 'info';
                } else
                    $type = 'default';

                ?>
            <div class="answer-view alert alert-<?=$type?>">
                <span class="key"><?=QuestionCtrl::getKText($opt)?>.</span><?=htmlspecialchars_decode($o->getText())?>
            </div>
            <?php };
            if ($done4) { ?>
            <hr>
            <blockquote>
                <?php if (!$selected) { ?>
                    <p><span class="g-red glyphicon glyphicon-remove-sign"></span> You did not answer this question.</p>
                <? } else {
                    if ($arr[$ques]->getRes() == 'success') { ?>
                        <p><span class="g-green glyphicon glyphicon-ok-sign"></span> You got your answer correct. </p>
                    <?php } else if ($arr[$ques]->getRes() == 'danger') { ?>
                        <p><span class="g-red glyphicon glyphicon-remove-sign"></span> You got your answer incorrect.</p>
                <?php }
                } ?>
            </blockquote>
            <?php } ?>
        </div>
    </div>
    <?php };
    if ($done4) { ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <span>Correct: <strong><?=$correct?> / <?=count($arr)?></strong></span>
            <br>
            Mark: <strong><?=$mark?></strong> of <?=$total?>
            <span class="label label-info"><?=number_format($mark*100/$total, 1, '.', ',');?>%</span>

        </div>
    </div>
    <?php } ?>
    <button id="back-to-top" type="button" class="btn btn-default"><span class="glyphicon glyphicon-chevron-up"></span> Back to top</button>
</div>
<script>
    $('#back-to-top').on('click', function (e) {
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
</script>