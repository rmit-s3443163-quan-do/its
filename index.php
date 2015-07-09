<?php

    $b = ($_COOKIE['uid']!='');

    if (!$b)
        echo '<script>window.location.href = "login.php";</script>';
?>

<?php if($b) : ?>
<!DOCTYPE html>
<html>
<head>
    <?php
    require_once('view/embed.php');
    ?>
</head>
<body>
<?php
require_once('view/nav.php');
?>
<div class="clear-top"></div>
<div class="container">
    <div class="jumbotron">
        <h1>Sequence Diagrams</h1>
        <p>It shows much the same information as a communication
            diagram, but they emphasise ordering.</p>
        <p><a class="btn btn-primary btn-lg" href="question1.php" role="button">Start test</a></p>
    </div>
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
<?php endif; ?>