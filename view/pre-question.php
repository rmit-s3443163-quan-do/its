<?php
require_once('./controller/QuestionCtrl.php');

$c = 1;
if (isset($_GET['c']) && $_GET['c']!='') {
    $c = $_GET['c'];
    if ($c != 1 && $c!=2)
        $c = 1;
}

$question_arr = QuestionCtrl::getQuestionsByCategory($c);

function getKText($k) {
    switch ($k) {
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

<div class="clear-top" style="margin-top: 100px"></div>
<div class="container">
    <ol class="breadcrumb" style="margin-bottom: 40px; margin-top: -30px">
        <li><a href="index.php">Home</a></li>
        <li class="active"><?=$type?></li>
    </ol>

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
        <?php foreach($question_arr as $key=>$q){ ?>
        <tr>
            <td><?=$key+1?></td>
            <td>
                <h4 class="question-title"><?=htmlspecialchars_decode($q->getTitle())?></h4>
                <?php foreach($q->getOpts() as $k=>$alt){ ?>
                    <div id="<?=$key?><?=$k?>" class="answer answer-<?=$key?> panel panel-default">
                        <span class="key"><?=getKText($k)?>.</span> <span><?=htmlspecialchars_decode($alt->getText())?></span>
                    </div>
                    <script>
                        $('#<?=$key?><?=$k?>').click(function () {
                            var radio = $('#<?=$key?><?=getKText($k)?>');

                            $('.answer-<?=$key?>').each(function () {
                                if ($(this).hasClass('selected')) {
                                    answered--;
                                    $(this).removeClass('selected');
                                }
                            });

                            if(radio.is(':checked') === false) {
                                $('#ans<?=$key?>').val('<?=$q->getId()?>:<?=$alt->getId()?>');
                                radio.prop('checked', true);
                                $(this).addClass('selected');
                                answered++;
                            } else {
                                $('#ans<?=$key?>').val('');
                                radio.prop('checked', false);
                                $(this).removeClass('selected');
                            }

                            $('#answered').html(answered);
                        });
                    </script>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>
                Answer Sheet <small>(Answered <span id="answered">0</span> / <?=count($question_arr)?>)</small></h2>
        </div>
        <div class="panel-body">
            <div class="row">
                <?php foreach($question_arr as $key=>$q){ ?>
                <div class="col-sm-6 col-md-4 answer-group"><a class="answer-title" href="#" id="q<?=$key?>">Question <?=$key+1?>.</a>
                    <?php foreach($q->getOpts() as $k=>$alt){ ?>
                    <div class="radio radio-primary radio-inline">
                        <input id="<?=$key?><?=getKText($k)?>" type="radio" value="<?=$key?><?=getKText($k)?>" name="q<?=$key?>">
                        <label for="<?=$key?><?=getKText($k)?>"> <?=getKText($k)?> </label>
                    </div>
                    <?php } ?>
                </div>
                <script>
                    $('#q<?=$key?>').click(function () {
                        var table = $('.datatable-1').DataTable();
                        table.page( <?=$key?> ).draw( false );;
                    });
                </script>
                <?php } ?>
            </div>
        </div>

        <div class="panel-footer">
            <button id="submit" type="button" class="btn btn-primary">
                <?php foreach($question_arr as $key=>$q){ ?>
                <input type="hidden" name="a<?=$key?>" id="ans<?=$key?>" />
                <?php } ?>
                <span class="bt-icon glyphicon glyphicon-send"></span>&nbsp;&nbsp;<span class="bt-text"> submit test</span>
            </button>
        </div>
    </div>

</div>

<script>
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
        "dom": '<"lb-info label label-warning pull-left"i><"pn-pre panel panel-default"<"panel-body"ptp>>',
        "pagingType": "simple"
    });
</script>