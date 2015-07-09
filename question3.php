<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <link href="css/style.css" media="screen" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
require_once('view/nav.php');
?>
<div class="clear-top"></div>
<div class="container">
    <h4><span class="label label-warning pull-left">Question 3 of 4:</span></h4><br/>
    <form action="question3-result.php">
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>
                <p>Consider the sequence diagram given below:</p>
                <p><img src="./img/quiz6-qn16.jpg"/></p>
                <p>For this sequence diagram to be valid which operations must exist in the OrderLine class in the class diagram?</p>
            </h4>
            <div class="answer panel panel-default">
                A. calculate, calculateBasePrice and getDiscount</div>
            <div class="answer panel panel-default">
                B. getDiscountInfo</div>
            <div class="answer panel panel-default">
                C. getQty and getProduct</div>
            <div class="answer panel panel-default">
                D. getPricingDetails</div>
            <button type="submit" class="btn btn-primary">Submit Answer</button>
        </div>
    </div>
    </form>
</div>
<?php
require_once('view/footer.php');
?>
<script>
    $('.answer').click(function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            $(this).addClass('selected');
        }
    });
    if ('createTouch' in document) {
        try {
            var ignore = /:hover/;
            for (var i = 0; i < document.styleSheets.length; i++) {
                var sheet = document.styleSheets[i];
                if (!sheet.cssRules) {
                    continue;
                }
                for (var j = sheet.cssRules.length - 1; j >= 0; j--) {
                    var rule = sheet.cssRules[j];
                    if (rule.type === CSSRule.STYLE_RULE && ignore.test(rule.selectorText)) {
                        sheet.deleteRule(j);
                    }
                }
            }
        }
        catch(e) {
        }
    }

</script>
</body>
</html>