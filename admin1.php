<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

    <link href="css/summernote.css" rel="stylesheet">
    <script src="js/summernote.min.js"></script>

    <link href="css/admin.css" media="screen" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
require_once('view/admin-nav.php');
?>
<div class="container-fluid">
    <?php
    require_once('view/admin-sidebar.php');
    ?>
    <div class="col-xs-9 col-sm-10 col-xs-offset-3 col-sm-offset-2 main">
        <form action="test.php" method="post" enctype="multipart/form-data" onsubmit="return postForm()">
        <h2 class="page-header">New Question</h2>
            <div class="form-group">
                <label for="question">Question Category</label>
                <select name="cate" class="form-control">
                    <option value="1">Pre-Test</option>
                    <option value="2">Post-Test</option>
                </select>
            </div>
            <div class="form-group">
                <label for="question">Question Title</label>
                <input name="title" type="text" class="sm form-control" id="question" placeholder="Question"/>
            </div>
            <div class="form-group">
                <label for="option1">Option 1</label> <input type="checkbox"/> is correct answer
                <input name="opt1" type="text" class="sm form-control" id="option1" placeholder="Option 1"/>
            </div>
            <div class="form-group">
                <label for="option2">Option 2</label> <input type="checkbox"/> is correct answer
                <input name="opt2" type="text" class="sm form-control" id="option2" placeholder="Option 2"/>
            </div>
            <div class="form-group">
                <label for="option3">Option 3</label> <input type="checkbox"/> is correct answer
                <input name="opt3" type="text" class="sm form-control" id="option3" placeholder="Option 3"/>
            </div>
            <div class="form-group">
                <label for="option4">Option 4</label> <input type="checkbox"/> is correct answer
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
    </div>
</div>


<script>
    var postForm = function() {
//        alert($('#question').code());
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
        ]

    });

</script>
</body>
</html>