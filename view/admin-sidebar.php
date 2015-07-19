<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 9/07/15
 * Time: 12:28 PM
 */

$p0 = $p1 = $p2 = $p3 = $phome = '';
if (isset($_GET['p']) && $_GET['p']!='') {
    $p = $_GET['p'];
    if ($p == 1)
        $p1 = ' class="active"';
    else if ($p == 2)
        $p2 = ' class="active"';
    else if ($p == 3)
        $p3 = ' class="active"';
    else
        $p0 = ' class="active"';
} else
    $phome = ' class="active"';

?>

    <ul class="nav nav-sidebar">
        <li<?=$phome?>><a href="admin.php"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;&nbsp;Dashboard</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li<?=$p0?>><a href="admin.php?p=0"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;&nbsp;Pre-Test List</a></li>
        <li<?=$p1?>><a href="admin.php?p=1"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;&nbsp;Post-Test List</a></li>
        <li<?=$p2?>><a href="admin.php?p=2"><span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;&nbsp;Survey</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li<?=$p3?>><a href="admin.php?p=3"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;Students</a></li>
        <li><a href="login.php?a=logout"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;&nbsp;Logout</a></li>
    </ul>
    <footer class="footer">
        <div class="container">
            <p class="text-muted"> QuanDo &copy; 2015 RMIT</p>
        </div>
    </footer>