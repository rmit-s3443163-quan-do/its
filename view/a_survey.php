<?php
    require_once('./controller/SurveyCtrl.php');

    $arr = SurveyCtrl::getSurveyList();

?>

<ol class="breadcrumb" style="margin-top: 50px;">
    <li><a href="admin.php">Admin CP</a></li>
    <li class="active">Survey</li>
</ol>
<h1 class="page-header">Survey Questions
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#new-question">
        <span class="glyphicon glyphicon-plus"></span> New Question</a>
    </button>
</h1>
<!-- Modal -->
<form id="new-survey-form" action="admin.php" method="post">
    <input type="hidden" name="p" value="13">
    <div class="modal fade" id="new-question" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <label>Title</label>
                    <input id="new-question" name="title" type="text" class="form-control" placeholder="required">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="submit-form" type="button" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $('#submit-form').click(function () {
        var dataString = $('#new-survey-form').serialize();
        $.ajax({
            type: "POST",
            url: "admin.php",
            data: dataString,
            success: function (result) {
                if (/okkkk/.test(result)) {
                    $('#new-question').modal('hide');
                    window.location.href='admin.php?p=2';
                }
            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });
    });
</script>
<div class="table-responsiv">
    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Question</th>
            <th>Voted</th>
            <th>Show</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($arr as $key=>$s){ ?>
            <tr>
                <td style="text-align: center">
                    <?=$key+1?>
                </td>
                <td><span id="title-<?=$s->getId()?>"><?=$s->getTitle()?></span></td>
                <td><?=$s->getPercent()?>%</td>
                <td><?=$s->getShow()==1?'Yes':'No'?></td>
                <td style="text-align: center">
                    <a href="#" data-toggle="modal" data-target="#update-question" id="<?=$s->getId()?>::<?=$s->getShow()==1?'checked':''?>">
                        <span class="glyphicon glyphicon-edit"></span></a>
                    &nbsp;&nbsp;
                    <a href="admin.php?p=14&id=<?=$s->getId()?>"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<form id="update-survey-form" action="admin.php" method="post">
    <input type="hidden" name="p" value="15">
    <input id="id-q" type="hidden" name="id">
    <div class="modal fade" id="update-question" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <input name="title" id="update-q"
                           type="text" class="form-control" placeholder="required">
                    <input id="show-q" class="pull-left" name="show" type="checkbox" />&nbsp; Show
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="submit-update-form" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $('#update-survey-form').on('show.bs.modal', function (e) {
        var id = e.relatedTarget.id;
        $('#id-q').val(id.split('::')[0]);
        $('#update-q').val($('#title-'+id.split('::')[0]).html());
        $('#show-q').prop('checked',id.split('::')[1]);
    });
    $('#submit-update-form').click(function () {
        var dataString = $('#update-survey-form').serialize();
        $.ajax({
            type: "POST",
            url: "admin.php",
            data: dataString,
            success: function (result) {
                if (/okkkk/.test(result))
                    window.location.href='admin.php?p=2';
            },
            error: function (xhr) {
                alert("An error occured: " + xhr.status + " " + xhr.statusText);
            }
        });
    });
</script>