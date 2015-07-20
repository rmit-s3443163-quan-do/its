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

$pre_chart = QuestionCtrl::getChart(1);
$post_chart = QuestionCtrl::getChart(2);

//print_r($pre_chart);

?>

<div class="clear-top hidden-xs"></div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6"><div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>
                        Pretest
                    </h2>
                </div>
                <div class="panel-body text-center">
                    <div class="row text-center">
                        <canvas id="chart-area-pre"/>
                    </div>
                    <div>
                        <ul class="legend-list list-unstyled list-inline">
                            <li><span class="leg leg-hd">&nbsp;</span> HD: <?=$pre_chart->hd()?></li>
                            <li><span class="leg leg-di">&nbsp;</span> DI: <?=$pre_chart->di()?></li>
                            <li><span class="leg leg-cr">&nbsp;</span> CR: <?=$pre_chart->cr()?></li>
                            <li><span class="leg leg-pa">&nbsp;</span> PA: <?=$pre_chart->pa()?></li>
                            <li><span class="leg leg-nn">&nbsp;</span> NN: <?=$pre_chart->nn()?></li>
                        </ul>
                    </div>Average Result: <span class="label label-<?=$pre_chart->getAverageClass()?>">
                        <?=$pre_chart->getAverageType()?></span> (<?=$pre_chart->getAverage()?>%)
                    <hr>
                    <div class="row">
                        Your Result
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
                    <span class="label label-primary">
                        <?=number_format($pre_mark*100/$pre_total, 1, '.', ',');?>%
                    </span>
<!--                    <span class="pull-right">Correct: <strong>--><?//=$pre_correct?><!--/--><?//=count($pre)?><!--</strong></span>-->

                    <span onclick="seePre()" class="pointer label label-primary pull-right">Detail</span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>
                        Posttest
                    </h2>
                </div>
                <div class="panel-body text-center">
                    <div class="row">
                        <canvas id="chart-area-post"/>
                    </div>
                    <div>
                        <ul class="legend-list list-unstyled list-inline">
                            <li><span class="leg leg-hd">&nbsp;</span> HD: <?=$post_chart->hd()?></li>
                            <li><span class="leg leg-di">&nbsp;</span> DI: <?=$post_chart->di()?></li>
                            <li><span class="leg leg-cr">&nbsp;</span> CR: <?=$post_chart->cr()?></li>
                            <li><span class="leg leg-pa">&nbsp;</span> PA: <?=$post_chart->pa()?></li>
                            <li><span class="leg leg-nn">&nbsp;</span> NN: <?=$post_chart->nn()?></li>
                        </ul>
                    </div>Average Result: <span class="label label-<?=$post_chart->getAverageClass()?>">
                        <?=$post_chart->getAverageType()?></span> (<?=$post_chart->getAverage()?>%)
                    <hr>
                    <div class="row">
                        Your Result<span class="label label-primary"></span>
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
                    <span class="label label-primary"><?=number_format($post_mark*100/$post_total, 1, '.', ',');?>%</span>
<!--                    <span class="pull-right">Correct: <strong>--><?//=$post_correct?><!--/--><?//=count($post)?><!--</strong></span>-->

                    <span onclick="seePost()" class="pointer label label-primary pull-right">Detail</span>
                </div>
            </div>

        </div>
    </div>
    <script>
        var pieData1 = [
            {
                value: <?=$pre_chart->hd()?>,
                color:"#3A89CC",
                label: "HD"
            },
            {
                value: <?=$pre_chart->di()?>,
                color: "#3FAACA",
                label: "DI"
            },
            {
                value: <?=$pre_chart->cr()?>,
                color: "#3F9C3F",
                label: "CR"
            },
            {
                value: <?=$pre_chart->pa()?>,
                color: "#FCC270",
                label: "PA"
            },
            {
                value: <?=$pre_chart->nn()?>,
                color: "#F5716D",
                label: "NN"
            }

        ];
        var pieData2 = [
            {
                value: <?=$post_chart->hd()?>,
                color:"#3A89CC",
                label: "HD"
            },
            {
                value: <?=$post_chart->di()?>,
                color: "#3FAACA",
                label: "DI"
            },
            {
                value: <?=$post_chart->cr()?>,
                color: "#3F9C3F",
                label: "CR"
            },
            {
                value: <?=$post_chart->pa()?>,
                color: "#FCC270",
                label: "PA"
            },
            {
                value: <?=$post_chart->nn()?>,
                color: "#F5716D",
                label: "NN"
            }

        ];

        window.onload = function(){
            var ctx = document.getElementById("chart-area-pre").getContext("2d");
            window.myPie1 = new Chart(ctx).Pie(pieData1);

            ctx = document.getElementById("chart-area-post").getContext("2d");
            window.myPie2 = new Chart(ctx).Pie(pieData2);
        };



    </script>
</div>
<style>
    .label {
        font-size: 12px;
        padding: 3px 7px;
    }
</style>
<script>
    function seePre() {
        window.location.href = 'index.php?p=21&c=1';
    }
    function seePost() {
        window.location.href = 'index.php?p=21&c=2';
    }

    $(document).ready(function () {
        $('input[type = "radio"]').click(function () {
            return false;
        });
    });
</script>