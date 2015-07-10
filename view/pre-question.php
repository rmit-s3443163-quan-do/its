<?php
require_once('./controller/QuestionCtrl.php');
QuestionCtrl::init();
?>

<div class="clear-top" style="margin-top: 100px"></div>
<div class="container">
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
        <?php foreach(QuestionCtrl::$questions as $key=>$q){ ?>
        <tr>
            <td><?=$key?></td>
            <td>
                <h4><?=$q->getTitle()?></h4>
                <?php foreach($q->getAlts() as $k=>$alt){ ?>
                    <div id="<?=$key?><?=$k?>" class="answer panel panel-default">
                        <span class="key"><?=$k?>.</span> <span><?=$alt->getText()?></span>
                    </div>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

    <button id="submit" type="button" class="btn btn-primary">
        <span class="bt-icon glyphicon glyphicon-send"></span>&nbsp;&nbsp;<span class="bt-text"> submit answers</span>
    </button>
</div>

<script>
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