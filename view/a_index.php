<?php
    require_once('./controller/QuestionCtrl.php');
    require_once('./model/Question.php');

?>


<h1 class="page-header">Question List
    <div class="pull-right">
        <h4><a href="admin.php?p=1"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;&nbsp;New Question</a></h4>
    </div>
</h1>

<div class="table-responsiv">
    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display">
        <thead>
        <tr>
            <th>#</th>
            <th>Question</th>
            <th>Point</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach(QuestionCtrl::getAll() as $key=>$q){ ?>
        <tr>
            <td style="text-align: center"><?=$key+1?></td>
            <td><?=$q->getShortTitle()?></td>
            <td><?=$q->getPoint()?></td>
            <td><?=$q->getCategoryName()?></td>
            <td style="text-align: center">
                <a href="admin.php?p=1&id=<?=$q->getId()?>"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;
                <a href="admin.php?p=0&a=del&id=<?=$q->getId()?>"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script>

    $('.datatable-1').dataTable({

    });
    $('.answer').click(function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            $(this).addClass('selected');
        }
    });
    $('input.form-control').summernote({
        onChange: function(e) {
//            $('#preview').html($('#summernote').code());
            // do something
        },

        minHeight: 200,                 // set editor height
        focus: true,                 // set focus to editable area after initializing summernote
        toolbar: [

            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['picture','link','hr']],
            ['misc',['codeview','undo','redo']]
        ]

    });

</script>
