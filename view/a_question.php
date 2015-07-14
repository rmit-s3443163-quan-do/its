<?php
    require_once('./controller/QuestionCtrl.php');
    require_once('./model/Question.php');

    $ok = 'hidden';


    if (isset($_GET['c']) && $_GET['c']!='') {
        if ($_GET['c']==1)
            $c1 = 'selected';
        else
            $c2 = 'selected';
    }

    if (isset($_POST['title']) && $_POST['title']!='') {

        $cate = htmlspecialchars($_POST['cate']);
        $point = htmlspecialchars($_POST['point']);
        $title = htmlspecialchars($_POST['title']);
        $explain = htmlspecialchars($_POST['explain']);

        $q_tmp = new Question($cate, $point, $title, $explain);
        $update = false;

        if (isset($_POST['ques_id']) && $_POST['ques_id']!='') {
            $update = true;
            $qid = $_POST['ques_id'];
            $q_tmp->setId($qid);
            QuestionCtrl::updateQuestion($q_tmp);
        } else {
            $qid = QuestionCtrl::addQuestion($q_tmp);
        }

        if ($qid>0) {
            $opt1 = htmlspecialchars($_POST['opt1']);
            $optCR1 = isset($_POST['opt1-cr']);

            $o = new Option($qid, $opt1, $optCR1);

            if ($update) {
                $o->setId($_POST['o1-id']);
                QuestionCtrl::updateOption($o);
            } else
                QuestionCtrl::addOption($o);

            $opt2 = htmlspecialchars($_POST['opt2']);
            $optCR2 = isset($_POST['opt2-cr']);

            $o = new Option($qid, $opt2, $optCR2);

            if ($update) {
                $o->setId($_POST['o2-id']);
                QuestionCtrl::updateOption($o);
            } else
                QuestionCtrl::addOption($o);

            $opt3 = htmlspecialchars($_POST['opt3']);

            $optCR3 = isset($_POST['opt3-cr']);
            $o = new Option($qid, $opt3, $optCR3);

            if ($update) {
                $o->setId($_POST['o3-id']);
                QuestionCtrl::updateOption($o);
            } else
                QuestionCtrl::addOption($o);

            $opt4 = htmlspecialchars($_POST['opt4']);
            $optCR4 = isset($_POST['opt4-cr']);
            $o = new Option($qid, $opt4, $optCR4);

            if ($update) {
                $o->setId($_POST['o4-id']);
                QuestionCtrl::updateOption($o);
            } else
                QuestionCtrl::addOption($o);

            $ok = '';
        }
    }

    $submit = 'Save';
    $text = 'added';
    $text_css = 'success';
    $title = 'New Question';

    if (isset($_GET['id']) && $_GET['id']!='') {

        $id = $_GET['id'];
        $link = '&id='.$id;
        $text = 'updated';
        $text_css = 'info';
        $submit ='Update';
        $title = 'Update Question';

        $q = QuestionCtrl::get($id);
    }

?>

<form action="admin.php?p=10<?=$link?>" method="post" enctype="multipart/form-data" onsubmit="return postForm()">
    <input type="hidden" name="ques_id" value="<?=$id?>"/>
    <h2 class="page-header"><?=$title?></h2>
    <div class="<?=$ok?> alert alert-<?=$text_css?>" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Question has been <?=$text?> successfully!
    </div>
    <div class="form-group">
        <label for="question">Question Category</label>
        <select name="cate" class="form-control">
            <option <?=$c1?> value="1">Pre-Test</option>
            <option <?=$c2?> value="2">Post-Test</option>
        </select>
    </div>
    <div class="form-group">
        <label for="question">Question Title</label>
        <input name="title" type="text" class="sm form-control" id="question" placeholder="Question"/>
    </div>
    <div class="form-group">
        <label for="option1">Option 1</label> <input name="opt1-cr" type="checkbox"/> is correct answer
        <input type="hidden" name="o1-id"/>
        <input name="opt1" type="text" class="sm form-control" id="option1" placeholder="Option 1"/>
    </div>
    <div class="form-group">
        <label for="option2">Option 2</label> <input name="opt2-cr" type="checkbox"/> is correct answer
        <input type="hidden" name="o2-id"/>
        <input name="opt2" type="text" class="sm form-control" id="option2" placeholder="Option 2"/>
    </div>
    <div class="form-group">
        <label for="option3">Option 3</label> <input name="opt3-cr" type="checkbox"/> is correct answer
        <input type="hidden" name="o3-id"/>
        <input name="opt3" type="text" class="sm form-control" id="option3" placeholder="Option 3"/>
    </div>
    <div class="form-group">
        <label for="option4">Option 4</label> <input name="opt4-cr" type="checkbox"/> is correct answer
        <input type="hidden" name="o4-id"/>
        <input name="opt4" type="text" class="sm form-control" id="option4" placeholder="Option 4"/>
    </div>
    <div class="form-group">
        <label for="explain">Explain:</label>
        <input name="explain" type="text" class="sm form-control" id="explain" placeholder="Explain answer"/>
    </div>
    <div class="form-group">
        <label for="point">Point:</label>
        <input name="point" type="number" class="form-control" id="point" placeholder="Point" value="1" />
    </div>
    <button type="submit" class="btn btn-primary"><?=$submit?></button>
</form>

<script>
    var postForm = function() {
        $('input[name="title"]').val($('#question').code());
        $('input[name="opt1"]').val($('#option1').code());
        $('input[name="opt2"]').val($('#option2').code());
        $('input[name="opt3"]').val($('#option3').code());
        $('input[name="opt4"]').val($('#option4').code());
        $('input[name="explain"]').val($('#explain').code());
    };

    $('input.sm').summernote({
        onChange: function(e) {
//            $('#preview').html($('#question').code());
            // do something
        },

        minHeight: 300,                 // set editor height
        focus: true,                 // set focus to editable area after initializing summernote
        toolbar: [
            //[groupname, [button list]]

            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
//                ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['picture','link','hr']],
//                ['misc',['codeview','undo','redo']]
        ],
        onPaste: function(e) {
            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
            e.preventDefault();
            document.execCommand('insertText', false, bufferText);
        }

    });
    setTimeout(function() {
        $('select[name="cate"]').val(<?=$q->getCategory()?>);
        $('input[name="title"]').code('<?=htmlspecialchars_decode($q->getTitle())?>');

        $('input[name="opt1"]').code('<?=htmlspecialchars_decode($q->getOpts()[0]->getText())?>');
        $('input[name="opt1-cr"]').attr('checked', <?=$q->getOpts()[0]->isCorrect()?'true':'false'?>);
        $('input[name="o1-id"]').val(<?=$q->getOpts()[0]->getId()?>);

        $('input[name="opt2"]').code('<?=htmlspecialchars_decode($q->getOpts()[1]->getText())?>');
        $('input[name="opt2-cr"]').attr('checked',<?=$q->getOpts()[1]->isCorrect()?'true':'false'?>);
        $('input[name="o2-id"]').val(<?=$q->getOpts()[1]->getId()?>);

        $('input[name="opt3"]').code('<?=htmlspecialchars_decode($q->getOpts()[2]->getText())?>');
        $('input[name="opt3-cr"]').attr('checked',<?=$q->getOpts()[2]->isCorrect()?'true':'false'?>);
        $('input[name="o3-id"]').val(<?=$q->getOpts()[2]->getId()?>);

        $('input[name="opt4"]').code('<?=htmlspecialchars_decode($q->getOpts()[3]->getText())?>');
        $('input[name="opt4-cr"]').attr('checked',<?=$q->getOpts()[3]->isCorrect()?'true':'false'?>);
        $('input[name="o4-id"]').val(<?=$q->getOpts()[3]->getId()?>);

        $('input[name="explain"]').code('<?=htmlspecialchars_decode($q->getExplain())?>');
    }, 200);

</script>