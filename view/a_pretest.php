<?php
    require_once('./controller/QuestionCtrl.php');
    require_once('./model/Question.php');


    $rm = 'hidden';

    if (isset($_GET['a']) && $_GET['a']!='') {
        if ($_GET['a'] == 1) {
            $id = $_GET['id'];
            QuestionCtrl::remove($id);
            $rm = '';
        }
    }

?>

<ol class="breadcrumb" style="margin-top: 50px;">
    <li><a href="admin.php">Admin CP</a></li>
    <li class="active">Pre-test</li>
</ol>

<div class="<?=$rm?> alert alert-success" role="alert" style="margin-top: 51px; margin-bottom: -30px">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <a href="#" class="alert-link">Question has been removed successfully!</a>
</div>

<h1 class="page-header">PreTest Question List
    <div class="pull-right">
        <h4><a href="admin.php?p=10&c=1"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;&nbsp;New Question</a></h4>
    </div>
</h1>

<div class="table-responsiv">
    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Question</th>
            <th>Point</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach(QuestionCtrl::getQuestionsByCategory(1) as $key=>$q){ ?>
        <tr>
            <td style="text-align: center"><?=$key+1?></td>
            <td><?=$q->getShortTitle()?></td>
            <td><?=$q->getPoint()?></td>
            <td style="text-align: center">
                <a href="admin.php?p=12&id=<?=$q->getId()?>"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;
                <a href="admin.php?p=0&a=1&id=<?=$q->getId()?>"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script>

    $('.datatable-1').dataTable({

    });
</script>
