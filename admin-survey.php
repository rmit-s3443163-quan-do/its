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
        <h1 class="page-header">Survey Statistics</h1>
        <h4 class="sub-header">Question 1. ITS required me to review my course materials regularly:</h4>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="74"
                 aria-valuemin="0" aria-valuemax="100" style="width:40%">
                Strongly Agree: 40%
            </div>
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:14%">
                Agree: 14%
            </div>
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:16%">
                Neutral: 16%
            </div>
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:12%">
                Disagree: 12%
            </div>
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:18%">
                Strongly Disagree: 18%
            </div>
        </div>

        <h4 class="sub-header">Question 2. ITS helped me to do well in the weekly tests:</h4>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="74"
                 aria-valuemin="0" aria-valuemax="100" style="width:44%">
                Strongly Agree: 44%
            </div>
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:14%">
                Agree: 14%
            </div>
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:12%">
                Neutral: 12%
            </div>
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:14%">
                Disagree: 14%
            </div>
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:16%">
                Strongly Disagree: 16%
            </div>
        </div>
        <h4 class="sub-header">Question 3. I spent on average 15 minutes or more on ITS each week (from week 4):</h4>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="74"
                 aria-valuemin="0" aria-valuemax="100" style="width:36%">
                Strongly Agree: 36%
            </div>
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:16%">
                Agree: 16%
            </div>
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:16%">
                Neutral: 16%
            </div>
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:18%">
                Disagree: 18%
            </div>
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:14%">
                Strongly Disagree: 14%
            </div>
        </div>
        <h4 class="sub-header">Question 4. The option to view questions by topics was useful:</h4>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="74"
                 aria-valuemin="0" aria-valuemax="100" style="width:60%">
                Strongly Agree: 60%
            </div>
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:28%">
                Agree: 28%
            </div>
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:12%">
                Neutral: 12%
            </div>
        </div>
        <h4 class="sub-header">Question 5. The option to raise queries and getting feedback was useful:</h4>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="74"
                 aria-valuemin="0" aria-valuemax="100" style="width:50%">
                Strongly Agree: 50%
            </div>
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:12%">
                Agree: 12%
            </div>
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:12%">
                Neutral: 12%
            </div>
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:12%">
                Disagree: 12%
            </div>
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="14"
                 aria-valuemin="0" aria-valuemax="100" style="width:14%">
                Strongly Disagree: 14%
            </div>
        </div>
        <h2 class="sub-header">Survey Editor</h2>
        <form>
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" class="form-control" id="question" placeholder="Question content"/>
            </div>

            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    </div>
</div>


<script>
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
            //[groupname, [button list]]

            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['picture','link','hr']],
            ['misc',['codeview','undo','redo']]
        ]

    });



</script>
</body>
</html>