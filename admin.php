<?php

$b = (isset($_COOKIE['uid']) && $_COOKIE['uid']!='');

if (!$b)
    echo '<script>window.location.href = "login.php";</script>';
else {

    $valid = ['admin', '0', '1', '2', '3', '4','10'];
    $page  = isset($_GET['p'])?$_GET['p']:(isset($_POST['p'])?$_POST['p']:'0');

    if (is_null($page))
        $content = 'view/a_pretest.php';
    else if (in_array($page, $valid)) {
        switch ($page) {
            case '0':
                $url = 'a_pretest';
                break;
            case '1':
                $url = 'a_posttest';
                break;
            case '10':
                $url = 'a_question';
                break;
        }
        $content = 'view/' . $url . '.php';
    }
}

?>


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
    <script src="./js/jquery.a.dataTables.js" type="text/javascript"></script>
<!--    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.0/css/jquery.dataTables.css" type="text/css"/>-->
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
        <?php
        require_once($content);
        ?>
    </div>
</div>


<script>
</script>
</body>
</html>
