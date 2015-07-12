<?php
    require_once('./controller/QuestionCtrl.php');
    require_once('./model/Question.php');

    $ok = 'hidden';


    if (isset($_POST['c']) && $_POST['c']!='') {
        if ($_POST['c']==1)
            $c1 = 'selected';
        else
            $c2 = 'selected';
    }

    if (isset($_POST['title']) && $_POST['title']!='') {

        $cate = htmlspecialchars($_POST['cate']);
        $point = htmlspecialchars($_POST['point']);
        $title = htmlspecialchars($_POST['title']);
        $explain = htmlspecialchars($_POST['explain']);

        $qid = QuestionCtrl::addQuestion(new Question($cate, $point, $title, $explain));

        if ($qid>0) {
            $opt = htmlspecialchars($_POST['opt1']);
            $optCR = $_POST['opt1-cr'];
            QuestionCtrl::addOption(new Option($qid, $opt, $optCR));

            $opt = htmlspecialchars($_POST['opt2']);
            $optCR = $_POST['opt2-cr'];
            QuestionCtrl::addOption(new Option($qid, $opt, $optCR));

            $opt = htmlspecialchars($_POST['opt3']);
            $optCR = $_POST['opt3-cr'];
            QuestionCtrl::addOption(new Option($qid, $opt, $optCR));

            $opt = htmlspecialchars($_POST['opt4']);
            $optCR = $_POST['opt4-cr'];
            QuestionCtrl::addOption(new Option($qid, $opt, $optCR));

            $ok = '';
        }
    }

?>


<form action="admin.php" method="post" enctype="multipart/form-data" onsubmit="return postForm()">
    <input type="hidden" name="p" value="1"/>
    <h2 class="page-header">New Question</h2>
    <div class="<?=$ok?> alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <a href="#" class="alert-link">Question has been added successfully!</a>
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
        <input name="opt1" type="text" class="sm form-control" id="option1" placeholder="Option 1"/>
    </div>
    <div class="form-group">
        <label for="option2">Option 2</label> <input name="opt2-cr" type="checkbox"/> is correct answer
        <input name="opt2" type="text" class="sm form-control" id="option2" placeholder="Option 2"/>
    </div>
    <div class="form-group">
        <label for="option3">Option 3</label> <input name="opt3-cr" type="checkbox"/> is correct answer
        <input name="opt3" type="text" class="sm form-control" id="option3" placeholder="Option 3"/>
    </div>
    <div class="form-group">
        <label for="option4">Option 4</label> <input name="opt4-cr" type="checkbox"/> is correct answer
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
    <button id="reset" type="reset" class="btn btn-default">Preview</button>
    <button type="submit" class="btn btn-primary">Save</button>
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

</script>