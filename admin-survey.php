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