<?php
require_once('./controller/QuestionCtrl.php');
require_once('./model/Question.php');

if (isset($_GET['id']) && $_GET['id']!='') {

    $id = $_GET['id'];
    $q = QuestionCtrl::get($id);

}
?>

<ol class="breadcrumb" style="margin-top: 50px;">
    <li><a href="admin.php">Admin CP</a></li>
    <li class="active">Update-Question</li>
</ol>
<h2 class="page-header">Update Question</h2>
<form action="admin.php" method="post" enctype="multipart/form-data" class="form-horizontal">
    <input type="hidden" name="p" value="11"/>
    <input type="hidden" name="qid" value="<?=$id?>"/>
    <input type="hidden" name="type" value="update"/>
    <div class="form-group">
        <label class="col-sm-1 control-label">Category</label>
        <div class="col-sm-11">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default active">
                    <input value="1" type="radio" name="cate" autocomplete="off" <?=$q->isCate(1)?>> Pre-test
                </label>
                <label class="btn btn-default">
                    <input value="2" type="radio" name="cate" autocomplete="off" <?=$q->isCate(2)?>> Post-test
                </label>
                <label class="btn btn-default">
                    <input value="3" type="radio" name="cate" autocomplete="off" <?=$q->isCate(3)?>> Decide later
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="point" class="col-sm-1 control-label">Point</label>
        <div class="col-sm-11">
            <input id="point" name="point" type="number" class="form-control" value="<?=$q->getPoint()?>">
        </div>
    </div>
    <div class="form-group">
        <label for="title" class="col-sm-1 control-label">Title</label>
        <div class="col-sm-11">
            <div class="question-input"><?=html_entity_decode($q->getTitle())?></div>
            <input type="hidden" name="title"/>
        </div>
    </div>

    <?php foreach($q->getOpts() as $index=>$opt){ ?>
    <div class="form-group">
        <label for="o<?=$index+1?>" class="col-sm-1 control-label">
            <input type="radio" value="<?=QuestionCtrl::getKText($index)?>" name="correct"
                   data-toggle="tooltip" data-placement="top" title="is this the correct answer?" <?=$opt->isCorrectText()?>>
            Option <?=QuestionCtrl::getKText($index)?></label>
        <div class="col-sm-11">
            <div class="question-input"><?=html_entity_decode($opt->getText())?></div>
            <input type="hidden" name="o::<?=QuestionCtrl::getKText($index)?>::<?=$opt->getId()?>" />
        </div>
    </div>
    <?php } ?>
    <div class="form-group">
        <label for="explain" class="col-sm-1 control-label">Explain</label>
        <div class="col-sm-11">
            <div class="question-input"><?=html_entity_decode($q->getExplain())?></div>
            <input type="hidden" name="explain" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-11">
            <button id="btn-add-question" type="submit" class="btn btn-primary">Update Question</button>
        </div>
    </div>
</form>

<script>
    $('[data-toggle="tooltip"]').tooltip();

    $('.question-input').tooltip({
        'placement': 'left',
        'title': 'Click to edit'
    });
    var cur_edit='';
    $('.question-input').click(function () {
        if (cur_edit!='')
            save();

        cur_edit = $(this);
        $(this).after('<div id="temp"><div class="click2edit">' + $(this).html()
            + '</div><button class="btn btn-primary" onclick="save()" type="button">Save</button></div>');
        $(this).hide();
        $('.click2edit').summernote({focus: true});
    });
    var save = function() {
        var aHTML = replace($('.click2edit').code());
        $('#temp').remove();
        cur_edit.html(aHTML);
        cur_edit.siblings('input').val(aHTML);
        cur_edit.show();
        cur_edit = '';

    };
    function replace(string) {
        return string.replace(/\"/g, '\'');
    }
</script>