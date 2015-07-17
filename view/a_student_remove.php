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
foreach ($_POST as $key => $value) {
//    echo $key.': '.$value.'<br>';
    if ($key == 'uid') {
        if (UserCtrl::has($value)) {
            echo ':::Username already exists!:::';
        } else {
            $pwd = 'qwerty';
            if ($_POST['pwd'] != $pwd)
                $pwd = $_POST['pwd'];
            $u = new User($value, $pwd);
            $u->setType($_POST['type']);

            UserCtrl::add($u);
            echo 'okkkk';
        }
    }
}
