

<div class="clear-top"></div>
<div class="container">
    <h4><span class="label label-warning pull-left">Question <?=$_GET['q']?> of 4:</span></h4><br/>
    <form method="get" action="index.php?p=pre&q=1">
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>A good OO design should aim for:</h4>
            <div class="answer panel panel-default">
                A. Low coupling and Low Cohesion</div>
            <div class="answer panel panel-default">
                B. High coupling and High Cohesion</div>
            <div class="answer panel panel-default">
                C. High Coupling and Low Cohesion</div>
            <div class="answer panel panel-default">
                D. Low Coupling and High Cohesion</div>
            <button type="submit" class="btn btn-primary">Submit Answer</button>
        </div>
    </div>
    </form>
</div>

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