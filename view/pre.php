<?php
    require_once('./controller/QuestionCtrl.php');
    QuestionCtrl::init();
    $b = true;
    if (isset($_POST['s']) && $_POST['s']!='') {
        $b = false;
        $s = $_POST['s'];
        $q = $_POST['q'];
        if ((QuestionCtrl::check($q,$s)))
            echo 'okkkk::'.QuestionCtrl::get($q)->getExplain().'::';
        else
            echo 'wrong::'.QuestionCtrl::get($q)->getExplain().'::'.QuestionCtrl::get($q)->getRs().'::';
    } else {
        $q = isset($_GET['q']) ? $_GET['q'] : 1;
        $cont = QuestionCtrl::get($q);
    }
?>
<?php if($b) : ?>
<div class="clear-top"></div>
<div class="container">
    <h4>
        <span class="label label-warning pull-left">
            Question <?=$q?> of <?=QuestionCtrl::size()?>:
        </span>
    </h4><br/>
    <input type="hidden" name="s" id="selected" />
    <div class="panel panel-default">
        <div class="panel-body">
            <h4 id="title"><?=$cont->getTitle()?></h4>
            <?php foreach($cont->getAlts() as $key=>$alt){ ?>
                <div id="<?=$key?>" class="answer panel panel-default">
                    <span class="key"><?=$key?>.</span> <span><?=$alt->getText()?></span>
                </div>
            <?php } ?>
            <button id="submit" type="button" class="btn btn-primary"><span class="bt-icon glyphicon glyphicon-send"></span>&nbsp;&nbsp;<span class="bt-text"> submit answer</span></button>
        </div>
    </div>
    <div id="alert-ok"  class="alert alert-success hidden" role="alert">
        <p><strong>Well Done!</strong> You got your answer correct.</p>
        <p><strong>Explain:</strong> <span class="explain"></span></p>
    </div>
    <div id="alert-wrong" class="alert alert-danger hidden" role="alert">
        <p><strong>Oh Snap!</strong> You got a wrong answer. <span class="correct-answer"></span></p>
        <p><strong>Explain:</strong> <span class="explain"></span></p>
        <p><button type="button" class="btn btn-warning"><span class="bt-icon glyphicon glyphicon-question-sign"></span>&nbsp;&nbsp; I still don't understand?? Help!!</button> </p>
    </div>
</div>

<script>
    var ssubmit = ' next question';
    if (<?=$q?> == <?=QuestionCtrl::size()?>)
        ssubmit = ' view overall results';

    $('#submit').click(function () {
        if ($('.bt-text').html() == ssubmit) {
            if (<?=$q+1?> > <?=QuestionCtrl::size()?>)
                window.location.href = 'index.php?p=0'; // later move to overall page
            else
                window.location.href = 'index.php?p=1&q=<?=$q+1?>';
        } else {
            if ($('#selected').val() == '') {
                $('#submit').addClass('btn-warning').removeClass('btn-primary').removeClass('btn-danger').removeClass('btn-success');
                $('.bt-icon').addClass('glyphicon-warning-sign').removeClass('glyphicon-send');
                $('.bt-text').html(' select something!');

            } else {
                $('#submit').addClass('btn-primary').removeClass('btn-success').removeClass('btn-danger');
                $('.bt-icon').removeClass('glyphicon-send').addClass('glyphicon-refresh').addClass('glyphicon-refresh-animate');
                $('.bt-text').html(' checking answer..');
                setTimeout(function () {
                    var dataString = 'p=1&q=<?=$q?>&s=' + $('#selected').val();
                    $.ajax({
                        type: "POST",
                        url: "index.php",
                        data: dataString,
                        success: function (result) {
                            if (/okkkk/.test(result)) {
                                $('#submit').addClass('btn-success').removeClass('btn-primary').removeClass('btn-danger');
                                $('.bt-icon').addClass('glyphicon-ok').removeClass('glyphicon-refresh').removeClass('glyphicon-refresh-animate');
                                $('.bt-text').html(' correct xD');
                                $('#alert-ok').removeClass('hidden');
                                $('#alert-wrong').addClass('hidden');
                                $('.selected').addClass('success').removeClass('selected');

                            } else {
                                $('#submit').addClass('btn-danger').removeClass('btn-primary').removeClass('btn-success');
                                $('.bt-icon').addClass('glyphicon-remove').removeClass('glyphicon-refresh').removeClass('glyphicon-refresh-animate');
                                $('.bt-text').html(' incorrect..');
                                $('#alert-wrong').removeClass('hidden');
                                $('#alert-ok').addClass('hidden');
                                $('.selected').addClass('danger').removeClass('selected');
                                $('.correct-answer').html(result.split('::')[2]);
                            }
                            $('.explain').html(result.split('::')[1]);
                        },
                        error: function (xhr) {
                            alert("An error occured: " + xhr.status + " " + xhr.statusText);
                        }
                    });
                }, 500);
                setTimeout(function () {
                    $('#submit').addClass('btn-primary').removeClass('btn-success').removeClass('btn-danger');
                    $('.bt-icon').addClass('glyphicon-chevron-right').removeClass('glyphicon-ok').removeClass('glyphicon-remove').removeClass('glyphicon-refresh').removeClass('glyphicon-refresh-animate');
                    $('.bt-text').html(ssubmit);
                }, 1500);
            }
        }
    });

    $('.answer').click(function () {

        if ($('.bt-text').html() == ssubmit) {

        } else {
            $('#submit').addClass('btn-primary').removeClass('btn-warning').removeClass('btn-danger').removeClass('btn-success');
            $('.bt-icon').addClass('glyphicon-send').removeClass('glyphicon-warning-sign').removeClass('glyphicon-remove').removeClass('glyphicon-ok');
            $('.bt-text').html(' submit answer');

            var id = $(this).attr('id');
            if (!$(this).hasClass('selected')) {
                $(this).removeClass('selected');
                var val = $('#selected').val() + id + ',';
                $('#selected').val(val);
            } else {
                $(this).addClass('selected');
                var val = $('#selected').val().replace(id + ',', '');
                $('#selected').val(val);
            }
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
<?php endif; ?>