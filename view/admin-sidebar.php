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
        <li id="admin"><a href="admin.php">Pre-question</a></li>
        <li id="java"><a href="java.php">Java</a></li>
        <li><a href="admin.php">Post-question</a></li>
        <li id="admin-survey"><a href="admin-survey.php">Survey</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li id="accounts"><a href="accounts.php">Accounts</a></li>
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