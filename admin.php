<?php
session_start();
require_once('./controller/UserCtrl.php');

$b = (isset($_COOKIE['uid']) && $_COOKIE['uid']!='');
$admin = (isset($_SESSION['admin']) && $_SESSION['admin']!='')?$_SESSION['admin']:'abort';

if (!$b)
    echo '<script>window.location.href = "login.php";</script>';
else if (UserCtrl::getType($_COOKIE['uid']) != 1903 || $admin != '^f8fg3j5&(:c3')
    echo '<script>window.location.href = "admin-login.php";</script>';
else {

    $valid = ['admin', '0', '1', '2', '3', '4','5','10','11','12','13','14','15','16','17','18','20'];
    $page  = isset($_GET['p'])?$_GET['p']:(isset($_POST['p'])?$_POST['p']:null);

    if (is_null($page))
        $content = 'view/dashboard.php';
    else if (in_array($page, $valid)) {
        switch ($page) {
            case '0':
                $url = 'a_pretest';
                break;
            case '1':
                $url = 'a_posttest';
                break;
            case '2':
                $url = 'a_survey';
                break;
            case '3':
                $url = 'a_users';
                break;
            case '10':
                $url = 'a_question';
                break;
            case '11':
                $url = 'add_question';
                break;
            case '12':
                $url = 'a_question_update';
                break;
            case '13':
                $url = 'a_add_survey';
                break;
            case '14':
                $url = 'a_remove_survey';
                break;
            case '15':
                $url = 'a_update_survey';
                break;
            case '16':
                $url = 'a_student_add';
                break;
            case '17':
                $url = 'a_student_reset_pw';
                break;
            case '18':
                $url = 'a_student_remove';
                break;
            case '20':
                $url = 'dashboard';
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
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/summernote.css" rel="stylesheet">
    <script src="js/summernote.min.js"></script>
    <link href="css/admin.css" media="screen" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <script src="./js/jquery.a.dataTables.js" type="text/javascript"></script>
<!--    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.0/css/jquery.dataTables.css" type="text/css"/>-->
    <script src="js/chart.min.js"></script>
</head>
<body>
<?php
require_once('view/admin-nav.php');
?>
<div class="container-fluid" style="margin-top: 60px">
    <div class="row">
        <div class="col-xs-3 col-sm-2 col-md-2">
            <?php
            require_once('view/admin-sidebar.php');
            ?>
        </div>
        <div class="col-xs-9 col-sm-10 col-md-10">
            <?php
            require_once($content);
            ?>
        </div>
    </div>
</div>


<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>
</body>
</html>
