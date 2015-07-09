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
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">ITS</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quan Do <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php">Homepage</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Querries</a></li>
                        <li><a href="#">Past Questions</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Change Password</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <div class="col-xs-3 col-sm-2 sidebar">
        <ul class="nav nav-sidebar">
            <li><a href="#">Overview</a></li>
            <li><a href="#">Querries</a></li>
        </ul>
        <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Pre-question</a></li>
            <li><a href="#">Java</a></li>
            <li><a href="#">Post-question</a></li>
            <li><a href="#">Survey</a></li>
        </ul>
        <ul class="nav nav-sidebar">
            <li><a href="#">Accounts</a></li>
            <li><a href="#">Statistics</a></li>
        </ul>
        <footer class="footer">
            <div class="container">
                <p class="text-muted"> QuanDo &copy; 2015 RMIT</p>
            </div>
        </footer>
    </div>
    <div class="col-xs-9 col-sm-10 col-xs-offset-3 col-sm-offset-2 main">
        <h1 class="page-header">Pre-question</h1>
        <div class="table-responsiv">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Querries</th>
                        <th>Created</th>
                        <th>Last edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>A good OO design should aim..</td>
                        <td>3</td>
                        <td>Quan Do</td>
                        <td>13:30 05/07/15</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Sequence diagrams are best..</td>
                        <td>2</td>
                        <td>Quan Do</td>
                        <td>14:10 05/07/15</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Consider the sequence diagram..</td>
                        <td>5</td>
                        <td>Quan Do</td>
                        <td>14:15 05/07/15</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Consider the communication diagram..</td>
                        <td>1</td>
                        <td>Quan Do</td>
                        <td>14:32 05/07/15</td>
                    </tr>
                </tbody>
            </table>
        </div>
<!--        <div id="preview">Preview</div>-->
<!--        <div id="summernote">Hello Summernote</div>-->
        <h2 class="sub-header">Question Editor</h2>
        <form>
            <div class="form-group">
                <label for="question">Question</label>
                <input type="text" class="form-control" id="question" placeholder="Question content"/>
            </div>
            <div class="form-group">
                <label for="option1">Option 1</label> <input type="checkbox"/> is correct answer
                <input type="text" class="form-control" id="option1" placeholder="Option 1"/>

            </div>
            <div class="form-group">
                <label for="option2">Option 2</label> <input type="checkbox"/> is correct answer
                <input type="text" class="form-control" id="option2" placeholder="Option 2"/>

            </div>
            <div class="form-group">
                <label for="option3">Option 3</label> <input type="checkbox"/> is correct answer
                <input type="text" class="form-control" id="option3" placeholder="Option 3"/>

            </div>
            <div class="form-group">
                <label for="option4">Option 4</label> <input type="checkbox"/> is correct answer
                <input type="text" class="form-control" id="option4" placeholder="Option 4"/>

            </div>
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
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