<?php

    $b = (isset($_COOKIE['uid']) && $_COOKIE['uid']!='');

    if (!$b)
        echo '<script>window.location.href = "login.php";</script>';
    else {
        $head = 'view/embed.php';
        $nav = 'view/nav.php';
        $foot = 'view/footer.php';

        $valid = ['index', '0', '1', '2', '3', '4'];
        $page  = isset($_GET['p'])?$_GET['p']:(isset($_POST['p'])?$_POST['p']:'0');

        if (is_null($page))
            $content = 'view/index.php';
        else if (in_array($page, $valid)) {
            switch ($page) {
                case '0':
                    $url = 'index';
                    break;
                case '1':
                    $url = 'pre';
                    break;
                case '2':
                    $url = 'practice';
                    break;
                case '3':
                    $url = 'post';
                    break;
                case '4':
                    $url = 'survey';
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
    <?php require_once($nav);?>

    <?php require_once($content);?>

    <?php require_once($foot);?>

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
<?php endif; ?>