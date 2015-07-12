<?php
require_once('./controller/QuestionCtrl.php');

if (isset($_GET['a']) && $_GET['a']!=0) {
    if ($_GET['a']=='del') {

    }
}


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

?>

<div class="clear-top" style="margin-top: 100px"></div>
<div class="container">
    <ol class="breadcrumb" style="margin-bottom: 40px; margin-top: -30px">
        <li><a href="index.php">Home</a></li>
        <li class="active">Pre-Test</li>
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
        <?php foreach(QuestionCtrl::getQuestionsByCategory(1) as $key=>$q){ ?>
        <tr>
            <td><?=$key+1?></td>
            <td>
                <h4><?=htmlspecialchars_decode($q->getTitle())?></h4>
                <?php foreach($q->getOpts() as $k=>$alt){ ?>
                    <div id="<?=$key?><?=$k?>" class="answer panel panel-default">
                        <span class="key"><?=getKText($k)?>.</span> <span><?=htmlspecialchars_decode($alt->getText())?></span>
                    </div>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <input type="hidden" name="s" id="selected" />
    <button id="submit" type="button" class="btn btn-primary">
        <span class="bt-icon glyphicon glyphicon-send"></span>&nbsp;&nbsp;<span class="bt-text"> submit answer</span>
    </button>
</div>

<script>

    $('#submit').click(function () {
        if ($('#selected').val() == '') {
            $('#submit').addClass('btn-warning').removeClass('btn-primary').removeClass('btn-danger').removeClass('btn-success');
            $('.bt-icon').addClass('glyphicon-warning-sign').removeClass('glyphicon-send');
            $('.bt-text').html(' select something!');

        } else {
            var dataString = 'p=1&s=' + $('#selected').val();
            $.ajax({
                type: "POST",
                url: "index.php",
                data: dataString,
                success: function (result) {
                    if (/okkkk/.test(result)) {

                    } else {
                    }
                },
                error: function (xhr) {
                    console.log("An error occured: " + xhr.status + " " + xhr.statusText);
                }
            });
        }
    });
    $('.answer').click(function () {
        $('#submit').addClass('btn-primary').removeClass('btn-warning').removeClass('btn-danger').removeClass('btn-success');
        $('.bt-icon').addClass('glyphicon-send').removeClass('glyphicon-warning-sign').removeClass('glyphicon-remove').removeClass('glyphicon-ok');
        $('.bt-text').html(' submit answer');

        var id = $(this).attr('id');
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            var val = $('#selected').val().replace(id + ',', '');
            $('#selected').val(val);
        } else {
            $(this).addClass('selected');
            var val = $('#selected').val() + id + ',';
            $('#selected').val(val);
        }
    });

    $('.datatable-1').dataTable({
        "lengthMenu": [[1, -1], [1, "All"]],
        "order": [[ 0, "asc" ]],
        "columnDefs": [
            {
                "targets": [0],
                "visible": false
            }
        ],
        "dom": '<"lb-info label label-warning pull-left"i><"pn-pre panel panel-default"<"panel-body"ptp>>',
        "pagingType": "simple_numbers"
    });
</script>