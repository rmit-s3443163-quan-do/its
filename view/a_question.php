<?php
    require_once('./controller/QuestionCtrl.php');
    require_once('./model/Question.php');

?>


<ol class="breadcrumb" style="margin-top: 50px;">
    <li><a href="admin.php">Admin CP</a></li>
    <li class="active">New Question</li>
</ol>
<h2 class="page-header">New Question</h2>
<form id="form-add-question" action="admin.php" method="post" enctype="multipart/form-data" onsubmit="return postForm()" class="form-horizontal">
    <input type="hidden" name="p" value="11"/>
    <input type="hidden" name="type" value="add"/>
    <div class="form-group">
        <label class="col-sm-1 control-label">Category</label>
        <div class="col-sm-11">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default active">
                    <input value="1" type="radio" name="cate" autocomplete="off" checked> Pre-test
                </label>
                <label class="btn btn-default">
                    <input value="2" type="radio" name="cate" autocomplete="off"> Post-test
                </label>
                <label class="btn btn-default">
                    <input value="3" type="radio" name="cate" autocomplete="off"> Decide later
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="point" class="col-sm-1 control-label">Point</label>
        <div class="col-sm-11">
            <input id="point" name="point" type="number" class="form-control" value="1">
        </div>
    </div>
    <div class="form-group">
        <label for="title" class="col-sm-1 control-label">Title</label>
        <div class="col-sm-11">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-question-sign"></span> </span>
                <input name="title" id="title" type="text" class="sm form-control" placeholder="what you want to ask?">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="o1" class="col-sm-1 control-label">Option A</label>
        <div class="col-sm-11">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="radio" value="a" name="correct" data-toggle="tooltip" data-placement="top" title="is this the correct answer?">
                </span>
                <input name="o::a" id="o1" type="text" class="sm form-control" placeholder="text here">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="o2" class="col-sm-1 control-label">Option B</label>
        <div class="col-sm-11">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="radio" value="b" name="correct" data-toggle="tooltip" data-placement="top" title="is this the correct answer?">
                </span>
                <input name="o::b" id="o2" type="text" class="sm form-control" placeholder="text here">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="o3" class="col-sm-1 control-label">Option C</label>
        <div class="col-sm-11">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="radio" value="c" name="correct" data-toggle="tooltip" data-placement="top" title="is this the correct answer?">
                </span>
                <input name="o::c" id="o3" type="text" class="sm form-control" placeholder="text here">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="o4" class="col-sm-1 control-label">Option D</label>
        <div class="col-sm-11">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="radio" value="d" name="correct" data-toggle="tooltip" data-placement="top" title="is this the correct answer?">
                </span>
                <input name="o::d" id="o4" type="text" class="sm form-control" placeholder="text here">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="explain" class="col-sm-1 control-label">Explain</label>
        <div class="col-sm-11">
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-comment"></span>
                </span>
                <input name="explain" id="explain" type="text" class="sm form-control" placeholder="optional">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-11">
            <button id="btn-add-question" type="submit" class="btn btn-primary">Add Question</button>
        </div>
    </div>
</form>

<script>
    var postForm = function() {
        $('input[name="title"]').val($('#title').code());
        $('input[name="o::a"]').val($('#o1').code());
        $('input[name="o::b"]').val($('#o2').code());
        $('input[name="o::c"]').val($('#o3').code());
        $('input[name="o::d"]').val($('#o4').code());
        $('input[name="explain"]').val($('#explain').code());
    };

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $('input.sm').summernote({
        minHeight: 300,
        focus: true,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['insert', ['picture','link','hr']],
        ],
        onPaste: function(e) {
            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
            e.preventDefault();
            document.execCommand('insertText', false, bufferText);
        }

    });
</script>