<?php
require_once('./controller/QuestionCtrl.php');

$c = 1;

if (isset($_GET['c']) && $_GET['c']!='') {
    $c = $_GET['c'];
    if ($c != 1 && $c!=2)
        $c = 1;
}



$question_arr = QuestionCtrl::getQuestionsByCategory($c);

function getKText($opt) {
    switch ($opt) {
        case 0:
            return 'A';
            break;
        case 1:
            return 'B';
            break;
        case 2:
            return 'C';
            break;
        case 3:
            return 'D';
            break;
    }
}

$type = 'Pre-Test';
if ($c == 2) {
    $type = 'Post-Test';
}

?>

<div class="clear-top hidden-xs"></div>
<div class="container">
    <ol class="breadcrumb" style="margin-bottom: 40px;">
        <li><a href="index.php">Home</a></li>
        <li class="active"><?=$type?></li>
    </ol>
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display" width="100%">
                <thead style="display: none;">
                <tr>
                    <th>No</th>
                    <th>
                        Questions
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($question_arr as $ques=>$q){ ?>
                    <tr>
                        <td><?=$ques+1?></td>
                        <td>
                            <h4 class="question-title"><?=htmlspecialchars_decode($q->getTitle())?></h4>
                            <?php foreach($q->getOpts() as $opt=>$alt){ ?>
                                <div id="answer_<?=$q->getId()?>_<?=$alt->getId()?>_<?=getKText($opt)?>" class="answer answer-<?=$q->getId()?> panel panel-default">
                                    <span class="key"><?=getKText($opt)?>.</span> <span><?=htmlspecialchars_decode($alt->getText())?></span>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>

                <script>
                    $('.answer').click(function () {
                        var id = $(this).attr('id');
                        var ques = id.split('_')[1];
                        var opt = id.split('_')[2];
                        var ktext = id.split('_')[3];

                        var radio = $('input:radio[name=q'+ques+']').filter('[value='+ques+'_'+opt+'_'+ktext+']');

                        $('.answer-'+ques).each(function () {
                            if ($(this).hasClass('selected')) {
                                answered--;
                                $(this).removeClass('selected');
                            }
                        });

                        if(radio.is(':checked') === false) {
                            $('#ans'+ques).val(ques+'_'+opt+"_"+ktext);
                            radio.prop('checked', true);
                            $(this).addClass('selected');
                            answered++;
                        } else {
                            $('#ans'+ques).val('');
                            radio.prop('checked', false);
                            $(this).removeClass('selected');
                        }
                        if (answered == <?=count($question_arr)?>) {
                            $('#answered-undone').addClass('hidden');
                            $('#answered-done').removeClass('hidden');
                        } else {
                            $('#answered').html(answered);
                            $('#answered-undone').removeClass('hidden');
                            $('#answered-done').addClass('hidden');
                        }
                    });
                </script>
                </tbody>
            </table>

        </div>
        <div class="col-md-12 col-lg-4">
            <div class="thisone panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>
                        Answer Sheet
                        <span id="answered-undone" class="pull-right" style="margin-top: 3px; font-size: 12px;">
                            Answered <span id="answered">0</span> / <?=count($question_arr)?>
                        </span>
                        <span id="answered-done" class="hidden pull-right" style="margin-top: 3px; font-size: 12px; color: darkgreen">
                            All answered <span class="glyphicon glyphicon-ok-circle" style="margin-right: 0"></span>
                        </span>
                    </h2>
                </div>
                <div class="panel-body text-center">
                    <div class="row">
                        <?php foreach($question_arr as $ques=>$q){ ?>
                            <div class="col-sm-6 col-md-4 col-lg-12 answer-group">
                                <a class="answer-title" href="#" id="q<?=$ques?>">Question <?=$ques+1?>.</a>
                                <?php foreach($q->getOpts() as $opt=>$alt){ ?>
                                    <div class="radio radio-primary radio-inline radio-disable">
                                        <input id="r<?=$q->getId()?>_<?=$alt->getId()?>_<?=$ques?>_<?=getKText($opt)?>"
                                               type="radio" value="<?=$q->getId()?>_<?=$alt->getId()?>_<?=getKText($opt)?>" name="q<?=$q->getId()?>">
                                        <label for="r<?=$q->getId()?>_<?=$alt->getId()?>_<?=$ques?>_<?=getKText($opt)?>"> <?=getKText($opt)?> </label>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="panel-footer">
                    <form id="answerSheet" action="index.php" method="post">
                        <input type="hidden" name="p" value="11">
                        <input type="hidden" name="c" value="<?=$c?>">
                        <?php foreach($question_arr as $q) { ?>
                            <input type="hidden" name="ans::<?=$q->getId()?>" id="ans<?=$q->getId()?>" />
                        <?php } ?>
                    <button id="submit" type="button" class="btn btn-primary" data-title="It can't be undone.<br>Are you sure?"
                            data-btn-ok-label="Sure!! " data-btn-cancel-label="No.. " data-on-confirm="submitTest"  data-toggle="confirmation" data-popout="true">
                        <span class="bt-icon glyphicon glyphicon-send"></span>&nbsp;&nbsp;<span class="bt-text"> submit test</span>
                    </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    $('.thisone').affix();

    $('.answer-title').click(function () {
        var id = $(this).attr('id').substring(1);
        var table = $('.datatable-1').DataTable();
        table.page( parseInt(id) ).draw( false );
    });
    $('input').change(function (e) {

        var table = $('.datatable-1').DataTable();

        var id = $(this).attr('id').substring(1);

        var ques = id.split('_')[0];
        var opt = id.split('_')[1];
        var num = id.split('_')[2];
        var ktext = id.split('_')[3];

        table.page(parseInt(num)).draw(false);

        $('.answer-' + ques).each(function () {
            if ($(this).hasClass('selected')) {
                answered--;
                $(this).removeClass('selected');
            }
        });

        $('#ans' + ques).val($(this).val());
        $('#answer_' + ques +'_'+ opt + '_' + ktext).addClass('selected');

        answered++;
        if (answered == <?=count($question_arr)?>) {
            $('#answered-undone').addClass('hidden');
            $('#answered-done').removeClass('hidden');
        } else {

            $('#answered-undone').removeClass('hidden');
            $('#answered-done').addClass('hidden');
        }

        $('#answered').html(answered);

    });

    $('#answerSheet').submit(function () {
        $('.bt-icon').removeClass('glyphicon-send').addClass('glyphicon-refresh').addClass('glyphicon-refresh-animate');
        $('.bt-text').html(' submitting..');
        setTimeout(function () {
            $.ajax({
                type: "POST",
                url: "index.php",
                data: $('#answerSheet').serialize(),
                success: function (result) {
                    if (/okkkk/.test(result)) {
                        $('#submit').addClass('btn-success').removeClass('btn-primary');
                        $('.bt-icon').addClass('glyphicon-ok').removeClass('glyphicon-refresh').removeClass('glyphicon-refresh-animate');
                        $('.bt-text').html(' submitted');
                        setTimeout(function () {
                            if (<?=$c?> == 1)
                                window.location.href = "index.php?p=12";
                            else
                                window.location.href = "index.php?p=14";

                        }, 2000);
                    }
                },
                error: function (xhr) {
                    alert("An error occured: " + xhr.status + " " + xhr.statusText);
                }
            });
        }, 2000);
    });

    function submitTest() {
        $('#answerSheet').submit();
    }

    var answered = 0;
    $('#answered').html(answered);
    $('.datatable-1').DataTable({
        "lengthMenu": [[1, -1], [1, "All"]],
        "order": [[ 0, "asc" ]],
        "columnDefs": [
            {
                "targets": [0],
                "visible": false
            }
        ],
        'dom': '<"lb-info label label-warning pull-left"i><"pn-pre panel panel-default"<"panel-body"ptp>>',
        "pagingType": "simple"
    });
    $('[data-toggle=confirmation]').confirmation();
</script>