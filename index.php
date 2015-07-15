<?php

    $b = (isset($_COOKIE['uid']) && $_COOKIE['uid']!='');

    if (!$b)
        echo '<script>window.location.href = "login.php";</script>';
    else {
        $head = 'view/embed.php';
        $nav = 'view/nav_new.php';
        $foot = 'view/footer.php';

        $valid = ['index', '0', '1', '2', '3', '4','11'];
        $page  = isset($_GET['p'])?$_GET['p']:(isset($_POST['p'])?$_POST['p']:'0');

        if (is_null($page))
            $content = 'view/index.php';
        else if (in_array($page, $valid)) {
            switch ($page) {
                case '0':
                    $url = 'index';
                    break;
                case '1':
                    $url = 'pre-question';
                    break;
                case '2':
                    $url = 'practice';
                    break;
                case '3':
                    $url = 'post-question';
                    break;
                case '4':
                    $url = 'survey';
                    break;
                case '11':
                    $url = 'submit_test';
                    break;
            }
            $content = 'view/' . $url . '.php';
        }
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