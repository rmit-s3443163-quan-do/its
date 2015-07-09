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
    <h4><span class="label label-warning pull-left">Question 4 of 4:</span></h4><br/>
    <form action="question4-result.php">
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>
                <p>Consider the communication diagram below:</p>
                <p><img src="./img/quiz5-qn3.jpg"/></p>
                <p>The above communication diagram is equivalent to which of the following sequence diagram?</p>
            </h4>
            <div class="col-xs-12 col-sm-6 answer panel panel-default">
                A. <img src="./img/quiz5-qn3-a.jpg"/> </div>
            <div class="col-xs-12 col-sm-6 answer panel panel-default">
                B. <img src="./img/quiz5-qn3-b.jpg"/></div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-6 answer panel panel-default">
                C. <img src="./img/quiz5-qn3-c.jpg"/></div>
            <div class="col-xs-12 col-sm-6 answer panel panel-default">
                D. <img src="./img/quiz5-qn3-d.jpg"/></div>
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