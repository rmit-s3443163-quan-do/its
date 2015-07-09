<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 10/07/15
 * Time: 12:31 AM
 */
?>
<div class="clear-top"></div>
<div class="container">
    <div class="jumbotron">
        <h1>ITS Survey</h1>
        <p>Help us make it better by answering these questions below:</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">View Result</a></p>
    </div>
    <form action="#">
        <h4><span class="label label-warning pull-left">Question 1 of 5:</span></h4><br/>
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>ITS required me to review my course materials regularly:</h4>
                <input value="0" type="number" class="rating" min=0 max=5 step=1 data-size="sm">
            </div>
        </div>
        <h4><span class="label label-warning pull-left">Question 2 of 5:</span></h4><br/>
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>ITS helped me to do well in the weekly tests:</h4>
                <input value="0" type="number" class="rating" min=0 max=5 step=1 data-size="sm">
            </div>
        </div>
        <h4><span class="label label-warning pull-left">Question 3 of 5:</span></h4><br/>
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>I spent on average 15 minutes or more on ITS each week (from week 4):</h4>
                <input value="0" type="number" class="rating" min=0 max=5 step=1 data-size="sm">
            </div>
        </div>
        <h4><span class="label label-warning pull-left">Question 4 of 5:</span></h4><br/>
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>The option to view questions by topics was useful:</h4>
                <input value="0" type="number" class="rating" min=0 max=5 step=1 data-size="sm">
            </div>
        </div>
        <h4><span class="label label-warning pull-left">Question 5 of 5:</span></h4><br/>
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>The option to raise queries and getting feedback was useful:</h4>
                <input value="0" type="number" class="rating" min=0 max=5 step=1 data-size="sm">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>