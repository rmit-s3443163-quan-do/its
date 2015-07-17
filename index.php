<?php

    require_once('./controller/UserCtrl.php');

    $b = (isset($_COOKIE['uid']) && $_COOKIE['uid']!='');

    if (!$b)
        echo '<script>window.location.href = "login.php";</script>';
    else {
        $head = 'view/embed.php';
        $nav = 'view/nav_new.php';
        $foot = 'view/footer.php';

        $valid = ['index', '0', '1', '2', '3', '4', '5','11', '12', '13','14', '15', '21'];
        $page  = isset($_GET['p'])?$_GET['p']:(isset($_POST['p'])?$_POST['p']:'0');

        if (in_array($page, $valid)) {
            switch ($page) {
                case '0':
                    $url = 'index';
                    $title = 'ATS - Homepage';
                    break;
                case '1':

                    $title = 'ATS - Pretest';
                    $url = !UserCtrl::isDone(1)?'pre-question':'pre_done';

                    if (isset($_GET['c']) && $_GET['c']!='')
                        if ($_GET['c'] == 2) {
                            $title = 'ATS - Posttest';
                            if (!UserCtrl::isDone(1))
                                header('Location: index.php?p=1');
                            else if (!UserCtrl::isDone(2))
                                header('Location: index.php?p=2');
                            else
                                $url = !UserCtrl::isDone(3) ? 'pre-question' : 'post_done';
                        }

                    break;
                case '2':
                    $title = 'ATS - Practice';
                    if (!UserCtrl::isDone(1)) {
                        header('Location: index.php?p=1');
                        echo '<script>console.log("not done")</script>';
                    } else
                        $url = !UserCtrl::isDone(2)?'practice':'practice_done';
                    break;
                case '4':
                    $title = 'ATS - Survey';
                    if (!UserCtrl::isDone(1))
                        header('Location: index.php?p=1');
                    else if (!UserCtrl::isDone(2))
                        header('Location: index.php?p=2');
                    else if (!UserCtrl::isDone(3))
                        header('Location: index.php?p=1&c==2');
                    else
                        $url = !UserCtrl::isDone(4)?'survey':'survey_done';
                    break;
                case '5':
                    $title = 'ATS - Results';
                    if (!UserCtrl::isDone(1))
                        header('Location: index.php?p=1');
                    else if (!UserCtrl::isDone(2))
                        header('Location: index.php?p=2');
                    else if (!UserCtrl::isDone(3))
                        header('Location: index.php?p=1&c=2');
                    else if (!UserCtrl::isDone(4))
                        header('Location: index.php?p=4');
                    else
                        $url = 'result';
                    break;
                case '11':
                    $url = 'submit_test';
                    break;
                case '12':
                    $title = 'ATS - Pretest';
                    if (!UserCtrl::isDone(1))
                        header('Location: index.php?p=1');
                    else
                        $url = 'pre_done';
                    break;
                case '13':
                    $title = 'ATS - Practice';
                    if (!UserCtrl::isDone(1))
                        header('Location: index.php?p=1');
                    else
                        $url = 'practice_done';
                    break;
                case '14':
                    $title = 'ATS - Posttest';
                    if (!UserCtrl::isDone(1))
                        header('Location: index.php?p=1');
                    else if (!UserCtrl::isDone(2))
                        header('Location: index.php?p=2');
                    else if (!UserCtrl::isDone(3))
                        header('Location: index.php?p=1&c=2');
                    else
                        $url = 'post_done';
                    break;
                case '15':
                    $title = 'ATS - Survey';
                    if (!UserCtrl::isDone(1))
                        header('Location: index.php?p=1');
                    else if (!UserCtrl::isDone(2))
                        header('Location: index.php?p=2');
                    else if (!UserCtrl::isDone(3))
                        header('Location: index.php?p=1&c=2');
                    else
                        $url = 'survey_done';
                    break;
                case '21':
                    $title = 'ATS - View Test';
                    $url = 'view_test';
                    break;
                default:
                    $title = 'ATS - Homepage';
                    header('Location: index.php');
                    break;
            }
        } else {
            $title = 'ATS - Homepage';
            header('Location: index.php');
        }

        $content = 'view/' . $url . '.php';
    }
?>

<?php if($b) : ?>
<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
    <?php require_once($head);?>
</head>
<body>
    <div id="main-page">
    <?php require_once($nav);?>

    <?php require_once($content);?>

    <?php require_once($foot);?>
    </div>
    <script>
        $('.st').click(function () {

            if (!$(this).hasClass('disable-step')) {
                var id = $(this).attr('id');
                window.location.href = id;
            }
        });
    </script>

    <script src="./js/bootstrap.min.js"></script>
    <script src="js/bootstrap-confirmation.min.js"></script>
    <script src="./js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="js/snabbt.min.js"></script>
    <script src="./js/my.js" type="text/javascript"></script>
</body>
</html>
<?php endif; ?>