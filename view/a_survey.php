<?php
    require_once('./controller/SurveyCtrl.php');

    $arr = SurveyCtrl::getSurveys();

?>

<ol class="breadcrumb" style="margin-top: 50px;">
    <li><a href="admin.php">Admin CP</a></li>
    <li class="active">Survey</li>
</ol>
<h1 class="page-header">Survey Questions
    <h4 class="pull-right">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#new-question">
            <span class="glyphicon glyphicon-plus"></span> New Question</a>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="new-question" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form>
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="required">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" checked> Show
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('#new-question').on('shown.bs.modal', function () {
                console.log('modal shown');
            })
        </script>
    </h4>
</h1>
<div class="table-responsiv">
    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Question</th>
            <th>Percent</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($arr as $key=>$s){ ?>
            <tr>
                <td style="text-align: center">
                    <?=$key+1?>
                </td>
                <td><?=$s->getTitle()?></td>
                <td><?=50?>%</td>
                <td style="text-align: center">
                    <a href="#"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;
                    <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
