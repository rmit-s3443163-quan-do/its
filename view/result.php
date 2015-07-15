<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 10/07/15
 * Time: 12:02 AM
 */

require_once('./controller/QuestionCtrl.php');

$pre = QuestionCtrl::getRes(1);
$post = QuestionCtrl::getRes(2);

$pre_total=0;
$pre_mark=0;
$pre_correct=0;

foreach ($pre as $p) {
    $pre_total += $p->getPoint();
    $pre_mark += $p->getMark();
    if ($p->getMark()>0)
        $pre_correct++;
}

$post_total=0;
$post_mark=0;
$post_correct=0;

foreach ($post as $p) {
    $post_total += $p->getPoint();
    $post_mark += $p->getMark();
    if ($p->getMark()>0)
        $post_correct++;
}

?>

<div class="clear-top"></div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-5 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>
                        Pre-test Result
                        <span class="label label-primary pull-right">Detail</span>
                    </h2>
                </div>
                <div class="panel-body text-center">
                    <div class="row">
                        <?php foreach($pre as $index=>$res){ ?>
                        <div class="answer-group">
                            <div style="display: inline-block; width: 60px; margin-right: 5px" class="label label-default">
                                <?=$res->getMark()?> / <?=$res->getPoint()?>
                            </div>
                            <div style="display: inline-block; width: 80px;">Question <?=$index+1?>.</div>
                            <div style="width: 80px" class="radio radio-<?=$res->getRes()?> radio-inline">
                                <input type="radio" checked>
                                <label> <?=$res->getKtext()?> </label>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="panel-footer">
                    Mark: <strong><?=$pre_mark?>.0</strong> of <?=$pre_total?>.0
                    <span class="label label-info"><?=number_format($pre_mark*100/$pre_total, 1, '.', ',');?>%</span>
                    <span class="pull-right">Correct: <strong><?=$pre_correct?>/<?=count($pre)?></strong></span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>
                        Post-test Result
                        <span class="label label-primary pull-right">Detail</span>
                    </h2>
                </div>
                <div class="panel-body text-center">
                    <div class="row">
                        <?php foreach($post as $index=>$res){ ?>
                            <div class="answer-group">
                                <div style="display: inline-block; width: 60px; margin-right: 5px" class="label label-default">
                                    <?=$res->getMark()?> / <?=$res->getPoint()?>
                                </div>
                                <div style="display: inline-block; width: 80px;">Question <?=$index+1?>.</div>
                                <div style="width: 80px" class="radio radio-<?=$res->getRes()?> radio-inline">
                                    <input type="radio" checked>
                                    <label> <?=$res->getKtext()?> </label>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="panel-footer">
                    Mark: <strong><?=$post_mark?>.0</strong> of <?=$post_total?>.0
                    <span class="label label-info"><?=number_format($post_mark*100/$post_total, 1, '.', ',');?>%</span>
                    <span class="pull-right">Correct: <strong><?=$post_correct?>/<?=count($post)?></strong></span>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .label {
        font-size: 12px;
        padding: 3px 7px;
    }
</style>
<script>
    $(document).ready(function () {
        $('input[type = "radio"]').click(function () {
            return false;
        });
    });
</script>