<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 16/07/15
 * Time: 2:55 PM
 */


require_once('./model/Survey.php');
require_once('./model/Vote.php');
require_once('./controller/DB.php');


class SurveyCtrl {

    /**
     * @param Vote $v
     */
    public static function vote($v) {

        $db = DB::getConn();

        $s = $v->getSurvey();
        $u = $v->getUid();
        $r = $v->getRate();
        $c = $v->getComment();

        $stm = $db->prepare('insert into Vote (survey, uid, rate, comment) values (:survey, :uid, :rate, :comment)');
        $stm->bindParam(':survey', $s);
        $stm->bindParam(':uid', $u);
        $stm->bindParam(':rate', $r);
        $stm->bindParam(':comment', $c);
        $stm->execute();

//        return DB::getLastID('Vote');

    }


    /**
     * @return Survey[]
     */
    public static function getSurveyList() {

        $db = DB::getConn();

        $stm = $db->prepare('select * from Survey');

        $stm->execute();
        $rss = $stm->fetchAll();
        $arr = [];

        foreach ($rss as $rs) {
            $q = new Survey($rs['title']);
            $q->setId($rs['id']);
            $q->setShow($rs['show']);
            $q->setPercent(SurveyCtrl::getPercent($rs['id']));
            $q->setCount(SurveyCtrl::getVotedNumber($rs['id']));

            $arr[] = $q;
        }

        return $arr;

    }


    /**
     * @return Survey[]
     */
    public static function getSurveys() {

        $db = DB::getConn();

        $stm = $db->prepare('select * from Survey');

        $stm->execute();
        $rss = $stm->fetchAll();
        $arr = [];

        foreach ($rss as $rs) {
            if ($rs['show']==1) {
                $q = new Survey($rs['title'], 1);
                $q->setId($rs['id']);
                $q->setPercent(SurveyCtrl::getPercent($rs['id']));
                $q->setCount(SurveyCtrl::getVotedNumber($rs['id']));

                $arr[] = $q;
            }
        }

        return $arr;

    }

    public static function getVotedNumber($id) {

        $db = DB::getConn();

        $stm = $db->prepare('select count(rate) from Vote where survey=:id');
        $stm->bindParam(':id', $id);
        $stm->execute();
        $rs = $stm->fetchAll();

        return $rs[0][0];

    }

    public static function getPercent($id) {

        $db = DB::getConn();

        $stm = $db->prepare('select avg(rate) from Vote where survey=:id');
        $stm->bindParam(':id', $id);
        $stm->execute();
        $rs = $stm->fetchAll();

        return number_format($rs[0][0], 1, '.', ',');

    }

    /**
     * @param Survey $s
     */
    public static function update($s) {

        $db = DB::getConn();
        $t = $s->getTitle();
        $sh = $s->getShow();
        $id = $s->getId();

        $stm = $db->prepare('update Survey set title=:title, show=:show where id=:id');
        $stm->bindParam(':title', $t);
        $stm->bindParam(':show', $sh);
        $stm->bindParam(':id', $id);
        $stm->execute();

//        return DB::getLastID('Survey');

    }

    /**
     * @param string $s
     */
    public static function add($s) {

        $db = DB::getConn();

        $stm = $db->prepare('insert into Survey (title) values (:title)');
        $stm->bindParam(':title', $s);
        $stm->execute();

//        return DB::getLastID('Survey');

    }

    /**
     * @param string $s
     */
    public static function remove($id) {

        $db = DB::getConn();

        $stm = $db->prepare('delete from Vote where survey=:id');
        $stm->bindParam(':id', $id);
        $stm->execute();

        $stm = $db->prepare('delete from Survey where id=:id');
        $stm->bindParam(':id', $id);
        $stm->execute();

    }

}