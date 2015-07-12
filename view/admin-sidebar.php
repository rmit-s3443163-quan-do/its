<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 9/07/15
 * Time: 12:28 PM
 */

?>
<div class="col-xs-3 col-sm-2 sidebar">
    <ul class="nav nav-sidebar">
        <li id="admin" class="active"><a href="admin.php?p=0"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;&nbsp;Pre-Test List</a></li>
        <li id="admin"><a href="admin.php?p=1"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;&nbsp;Post-Test List</a></li>
        <li id="admin-survey"><a href="admin-survey.php"><span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;&nbsp;Survey</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li id="accounts"><a href="accounts.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;Accounts</a></li>
        <li id="accounts"><a href="login.php?a=logout"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;&nbsp;Logout</a></li>
    </ul>
    <footer class="footer">
        <div class="container">
            <p class="text-muted"> QuanDo &copy; 2015 RMIT</p>
        </div>
    </footer>
</div>

<script>
    var cl = location.pathname.split("/")[3].split(".")[0];
    $('#' + cl).addClass('active');
</script>