<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 12/07/15
 * Time: 8:59 AM
 */

require_once('./model/User.php');
require_once('./controller/DB.php');
require_once('./controller/QuestionCtrl.php');

class UserCtrl {

    /**
     * @return User[]
     */
    public static function getUserList() {

        $db = DB::getConn();

        $stm = $db->prepare('select * from Users where type=1');
        $stm->execute();

        $rss = $stm->fetchAll();
        $arr = [];

        foreach ($rss as $rs) {
            $q = new User($rs['username'], '');
            $q->setId($rs['id']);
            $q->setType($rs['type']);

            $arr[] = $q;
        }

        return $arr;

    }

    /**
     * @return bool
     * @param int $step
     */
    public static function isDone($step) {

        switch ($step) {
            case 1:
                return QuestionCtrl::isDone(1);
                break;
            case 2:
                return QuestionCtrl::isDone(3);
                break;
            case 3:
                return QuestionCtrl::isDone(2);
                break;
            case 4:
                return QuestionCtrl::isDone(4);
                break;
        }

    }

    /**
     * @return bool
     */
    public static function isAdmin($uid)
    {
        $db = DB::getConn();

        $stm = $db->prepare('select type from Users where username=:id');
        $stm->bindParam(':id', $uid);
        $stm->execute();
        $rs = $stm->fetchAll();

        if (count($rs)>0)
            return $rs[0][0]==1903?true:false;
        else
            return false;
    }

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
     * @return string
     * @param User $user
     */
    public static function add($user) {
        if (UserCtrl::has($user->getUsername()))
            return 'Duplicate User!';
        else {

            $db = DB::getConn();

            $stm = $db->prepare('insert into Users (username, password, type) values (:uid, :pwd, :type)');
            $stm->bindParam(':uid', $user->getUsername());
            $stm->bindParam(':pwd', $user->getPassword());
            $stm->bindParam(':type', $user->getType());

            return $stm->execute();

        }
    }

    public static function getType($id) {

        $db = DB::getConn();

        $stm = $db->prepare('select type from Users where username=:id');
        $stm->bindParam(':id', $id);
        $stm->execute();
        $rs = $stm->fetchAll();
        if (count($rs)>0)
            return $rs[0][0];
        else
            return -1;

    }

    /**
     * @return bool
     * @param int $id
     */
    public static function remove($id) {
        $db = DB::getConn();
        $stm = $db->prepare('delete from Users where id=:id or type=100');
        $stm->bindParam(':id', $id);
        return $stm->execute();
    }

    /**
     * @return bool
     * @param int $id
     */
    public static function resetPassword($id) {
        $db = DB::getConn();

        $stm = $db->prepare('update Users set password=:pwd where id=:id');
        $stm->bindParam(':id', $id);
        $stm->bindParam(':pwd', md5('qwerty'));

        return $stm->execute();
    }

    /**
     * @return bool
     * @param string $uid
     */
    public static function has($uid) {
        $db = DB::getConn();

        $stm = $db->prepare('select * from Users where username = :uid and type!=100');
        $stm->bindParam(':uid', $uid);

        $stm->execute();
        $rs = $stm->fetchAll();

        return count($rs)>0?true:false;
    }


}