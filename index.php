<?php

    require_once('./controller/UserCtrl.php');

    $b = (isset($_COOKIE['uid']) && $_COOKIE['uid']!='');

    if (!$b)
        echo '<script>window.location.href = "login.php";</script>';
    else {
        $head = 'view/embed.php';
        $nav = 'view/nav_new.php';
        $foot = 'view/footer.php';

        $valid = ['index', '0', '1', '2', '3', '4', '5','11', '12', '13','14', '15'];
        $page  = isset($_GET['p'])?$_GET['p']:(isset($_POST['p'])?$_POST['p']:'0');

        if (in_array($page, $valid)) {
            switch ($page) {
                case '0':
                    $url = 'index';
                    break;
                case '1':
                    $url = !UserCtrl::isDone(1)?'pre-question':'pre_done';

                    if (isset($_GET['c']) && $_GET['c']!='')
                        if ($_GET['c'] == 2) {
                            if (!UserCtrl::isDone(1))
                                header('Location: index.php?p=1');
                            else if (!UserCtrl::isDone(2))
                                header('Location: index.php?p=2');
                            else
                                $url = !UserCtrl::isDone(3) ? 'pre-question' : 'post_done';
                        }

                    break;
                case '2':
                    if (!UserCtrl::isDone(1)) {
                        header('Location: index.php?p=1');
                        echo '<script>console.log("not done")</script>';
                    } else
                        $url = !UserCtrl::isDone(2)?'practice':'practice_done';
                    break;
                case '4':
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
                    if (!UserCtrl::isDone(1))
                        header('Location: index.php?p=1');
                    else
                        $url = 'pre_done';
                    break;
                case '13':
                    if (!UserCtrl::isDone(1))
                        header('Location: index.php?p=1');
                    else if (!UserCtrl::isDone(2))
                            header('Location: index.php?p=2');
                    else
                        $url = 'practice_done';
                    break;
                case '14':
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
                    if (!UserCtrl::isDone(1))
                        header('Location: index.php?p=1');
                    else if (!UserCtrl::isDone(2))
                        header('Location: index.php?p=2');
                    else if (!UserCtrl::isDone(3))
                        header('Location: index.php?p=1&c=2');
                    if (!UserCtrl::isDone(4))
                        header('Location: index.php?p=4');
                    else
                        $url = 'survey_done';
                    break;
                default:
                    header('Location: index.php');
                    break;
            }
        } else {
            header('Location: index.php');
        }

        $content = 'view/' . $url . '.php';
    }
?>

<?php if($b) : ?>
<!DOCTYPE html>
<html>
<head>
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
</body>
</html>
<?php endif; ?>