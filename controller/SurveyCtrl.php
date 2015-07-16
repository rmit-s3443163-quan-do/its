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
                $arr[] = $q;
            }
        }

        return $arr;

    }

    /**
     * @param Survey $s
     */
    public static function add($s) {

        $db = DB::getConn();
        $t = $s->getTitle();
        $sh = $s->getShow();

        $stm = $db->prepare('insert into Survey (title, show) values (:title, :show)');
        $stm->bindParam(':title', $t);
        $stm->bindParam(':cate', $sh);
        $stm->execute();

//        return DB::getLastID('Survey');

    }

}