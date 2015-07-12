<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 12/07/15
 * Time: 8:59 AM
 */

require_once('./model/User.php');
require_once('./controller/DB.php');

class UserCtrl {

    /**
     * @return bool
     * @param User $user
     */
    public static function login($user) {

        $db = DB::getConn();

        $stm = $db->prepare('select * from Users where username = :uid and password = :pwd');
        $stm->bindParam(':uid', $user->getUsername());
        $stm->bindParam(':pwd', $user->getPassword());

        $stm->execute();
        $rs = $stm->fetchAll();

        if (count($rs)>0)
            return true;
        else
            return false;

    }

    /**
     * @return bool
     * @param User $user
     */
    public static function add($user) {
        if (UserCtrl::has($user))
            return false;
        else {

            $db = DB::getConn();

            $stm = $db->prepare('insert into Users (username, password, type) values (:uid, :pwd, :type)');
            $stm->bindParam(':uid', $user->getUsername());
            $stm->bindParam(':pwd', $user->getPassword());
            $stm->bindParam(':type', $user->getType());

            return $stm->execute();

        }
    }

    /**
     * @return bool
     * @param User $user
     */
    public static function has($user) {
        $db = DB::getConn();

        $stm = $db->prepare('select * from Users where username = :uid');
        $stm->bindParam(':uid', $user->getUsername());

        $stm->execute();
        $rs = $stm->fetchAll();

        return count($rs);
    }


}