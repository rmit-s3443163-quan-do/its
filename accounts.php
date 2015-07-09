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
        <h1 class="page-header">Accounts</h1>
        <div class="table-responsiv">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>quando</td>
                    <td>Admin</td>
                    <td>13:30 05/07/15</td>
                    <td>
                        <a href="#">Reset Password</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>s3443163</td>
                    <td>Student</td>
                    <td>13:30 05/07/15</td>
                    <td>
                        <a href="#">Reset Password</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <h2 class="sub-header">Add Account</h2>
        <form>
            <div class="form-group">
                <label for="question">ID</label>
                <input type="text" class="form-control" id="question" placeholder="ID"/>
            </div>
            <div class="form-group">
                <label for="option1">Password</label>
                <input type="text" class="form-control" id="option1" placeholder="Password"/>

            </div>

            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary">Add</button>
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
</script>
</body>
</html>