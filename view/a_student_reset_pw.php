<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 15/07/15
 * Time: 2:54 PM
 */

require_once('./controller/UserCtrl.php');
require_once('./model/User.php');

echo '<br><br><br><br>';
foreach ($_GET as $key => $value) {
//    echo $key.': '.$value.'<br>';
    if ($key == 'id') {
        UserCtrl::resetPassword($value);
        echo 'okkkk';
    }
}
?>

<script>
    window.location.href = 'admin.php?p=3';
</script>
