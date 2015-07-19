<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <link href="css/style.css" media="screen" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
require_once('view/nav_new.php');
?>
<div class="clear-top"></div>
<div class="container">
    <h1>Change Password</h1>
    <form>
        <div class="form-group">
            <label for="question">Current Password</label>
            <input type="password" class="form-control" id="question" placeholder="Current Password"/>
        </div>
        <div class="form-group">
            <label for="option1">New Password</label>
            <input type="password" class="form-control" id="option1" placeholder="New Password"/>
        </div>
        <div class="form-group">
            <label for="option2">Retype New Password</label>
            <input type="password" class="form-control" id="option2" placeholder="Retype New Password"/>
        </div>

        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Change</button>
    </form>
</div>
<?php
require_once('view/footer.php');
?>
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