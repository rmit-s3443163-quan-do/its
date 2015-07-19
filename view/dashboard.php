<?php

require_once('./controller/QuestionCtrl.php');

$pre_chart = QuestionCtrl::getChart(1);
$post_chart = QuestionCtrl::getChart(2);
?>

<div class="row">
    <div class="col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Pre Test Results
            </div>
            <div class="panel-body">
                <div class="text-center">
                    <canvas id="chart-area-pre"/>
                </div>Average Result: <span class="label label-<?=$pre_chart->getAverageClass()?>">
                        <?=$pre_chart->getAverageType()?></span> (<?=$pre_chart->getAverage()?>%)
                <hr>
                <div>
                    <ul class="legend-list list-unstyled list-inline">
                        <li><span class="leg leg-hd">&nbsp;</span> HD: <?=$pre_chart->hd()?></li>
                        <li><span class="leg leg-di">&nbsp;</span> DI: <?=$pre_chart->di()?></li>
                        <li><span class="leg leg-cr">&nbsp;</span> CR: <?=$pre_chart->cr()?></li>
                        <li><span class="leg leg-pa">&nbsp;</span> PA: <?=$pre_chart->pa()?></li>
                        <li><span class="leg leg-nn">&nbsp;</span> NN: <?=$pre_chart->nn()?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Post Test Results
            </div>
            <div class="panel-body">
                <div class="text-center">
                    <canvas id="chart-area-post"/>
                </div>Average Result: <span class="label label-<?=$post_chart->getAverageClass()?>">
                        <?=$post_chart->getAverageType()?></span> (<?=$post_chart->getAverage()?>%)
                <hr>
                <div>
                    <ul class="legend-list list-unstyled list-inline">
                        <li><span class="leg leg-hd">&nbsp;</span> HD: <?=$post_chart->hd()?></li>
                        <li><span class="leg leg-di">&nbsp;</span> DI: <?=$post_chart->di()?></li>
                        <li><span class="leg leg-cr">&nbsp;</span> CR: <?=$post_chart->cr()?></li>
                        <li><span class="leg leg-pa">&nbsp;</span> PA: <?=$post_chart->pa()?></li>
                        <li><span class="leg leg-nn">&nbsp;</span> NN: <?=$post_chart->nn()?></li>
                    </ul>
                </div>
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