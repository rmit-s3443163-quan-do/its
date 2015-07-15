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
    <ol class="breadcrumb" style="margin-bottom: 40px;">
        <li><a href="index.php">Home</a></li>
        <li class="active">Survey</li>
    </ol>
    <form action="index.php?p=15" method="post">
        <input type="hidden" name="p" value="15">
        <h4><span class="label label-warning pull-left">Question 1 of 2:</span></h4><br/>
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>ITS required me to review my course materials regularly:</h4>
                <div data-toggle="tooltip" data-placement="bottom" title="Naah" class="mood yeck"></div>
                <div data-toggle="tooltip" data-placement="bottom" title="Meh" class="mood meh"></div>
                <div data-toggle="tooltip" data-placement="bottom" title="Yes" class="mood good"></div>
                <div data-toggle="tooltip" data-placement="bottom" title="Absolutely!!" class="mood awesome"></div>
            </div>
        </div>
        <h4><span class="label label-warning pull-left">Question 2 of 2:</span></h4><br/>
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>ITS helped me to do well in the weekly tests:</h4>
                <div data-toggle="tooltip" data-placement="bottom" title="Naah" class="mood yeck"></div>
                <div data-toggle="tooltip" data-placement="bottom" title="Meh" class="mood meh"></div>
                <div data-toggle="tooltip" data-placement="bottom" title="Yes" class="mood good"></div>
                <div data-toggle="tooltip" data-placement="bottom" title="Absolutely!!" class="mood awesome"></div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit survey</button>
    </form>
</div>
<script>
    $(document).ready(function(){
        $(".mood").hover(function(){
            snabbt($(this), {
                fromPosition: [0, 0, 0],
                position: [0, -5, 0],
                easing: 'easeIn',
                duration: 200
            });
        }, function(){
            snabbt($(this), {
                fromPosition: [0, -5, 0],
                position: [0, 0, 0],
                easing: 'easeIn',
                duration: 200
            });
        });
    });

    $('.answer').click(function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            $(this).addClass('selected');
        }
    });
    $('.rating').rating({
        starCaptions: {1: 'Strongly Disagree', 2: 'Disagree', 3: 'Neutral', 4: 'Agree', 5: 'Strongly Agree'}
    });
    $('[data-toggle="tooltip"]').tooltip();
</script>