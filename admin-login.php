<?php
session_start();

require_once('./controller/UserCtrl.php');

$uid = isset($_POST['username'])?$_POST['username']:'';
$pwd = isset($_POST['password'])?$_POST['password']:'';

if (UserCtrl::getType($_COOKIE['uid']) != 1903) {
    echo '<script>window.location.href="index.php";</script>';
}

if ($uid != '' && $pwd != '') {
    if (UserCtrl::login(new User($uid,$pwd)) && UserCtrl::getType($uid) == 1903) {
        $_SESSION['admin'] = '^f8fg3j5&(:c3';
        echo '<script>window.location.href="admin.php";</script>';
    } else {
        if (UserCtrl::login(new User($uid,$pwd)) && UserCtrl::getType($uid) != 1903) {
            setcookie('uid', $uid);
            echo '<script>alert("You dont have admin access. Redirect to homepage");</script>';
            echo '<script>window.location.href="index.php";</script>';
        } else
            echo '<script>alert("Incorrect username/password.");</script>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ACP Login</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/admin-signin.css" rel="stylesheet">

</head>

<body>

<div class="container">

    <form class="form-signin" action="admin-login.php" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" name="username" class="form-control" placeholder="username" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="password" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->

</body>
</html>
