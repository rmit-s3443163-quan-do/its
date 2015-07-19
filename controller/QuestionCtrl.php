<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 10/07/15
 * Time: 8:51 AM
 */

require_once('./model/Question.php');
require_once('./model/Option.php');
require_once('./model/Answer.php');
require_once('./model/Result.php');
require_once('./model/Chart.php');
require_once('./controller/DB.php');

class QuestionCtrl
{

    public static function getKText($opt)
    {
        switch ($opt) {
            case 0:
                return 'A';
                break;
            case 1:
                return 'B';
                break;
            case 2:
                return 'C';
                break;
            case 3:
                return 'D';
                break;
            case 4:
                return 'E';
                break;
            case 5:
                return 'F';
                break;
            case 6:
                return 'G';
                break;
        }
    }

    /**
     * @return Chart
     */
    public static function getChart($cate)
    {
        /** @var Chart $chart */
        $chart = new Chart();

        $db = DB::getConn();

        $stm = $db->prepare('select uid, cate, ans from Answers where cate=:cate');
        $stm->bindParam(':cate', $cate);
        $stm->execute();
        $rs = $stm->fetchAll();

        $legends = [];
        foreach ($rs as $r) {
            $results = QuestionCtrl::getResByID($r['uid'], $r['cate']);
            $mark = 0;
            $total = 0;
            foreach ($results as $result) {
                $total += $result->getPoint();
                $mark += $result->getMark();
            }
            if ($total!=0)
                $legends[] = number_format($mark*100/$total, 1, '.', ',');

        }
        $chart->setLegends($legends);
        return $chart;

    }

    /**
     * @return Result[]
     */
    public static function getResByID($uid, $cate) {
        $db = DB::getConn();

        $stm = $db->prepare('select ans from Answers where uid=:uid and cate=:cate');
        $stm->bindParam(':uid', $uid);
        $stm->bindParam(':cate', $cate);
        $stm->execute();
        $rs = $stm->fetchAll();

        $arr = explode(',', $rs[0][0]);
        $temp = [];

        foreach ($arr as $a)
            $temp[] = new Result(explode('_', $a)[2], explode('_', $a)[3], QuestionCtrl::getPoint(explode('_', $a)[0]));

        return $temp;
    }

    /**
     * @return Result[]
     */
    public static function getRes($cate) {
        $uid = $_COOKIE['uid'];
        return QuestionCtrl::getResByID($uid, $cate);
    }

    /**
     * @return int
     */
    public static function getPoint($ques)
    {
        $db = DB::getConn();

        $stm = $db->prepare('select point from Question where id=:id');
        $stm->bindParam(':id', $ques);
        $stm->execute();
        $rs = $stm->fetchAll();

        return $rs[0][0];
    }

    /**
     * @return bool
     * @param int $step
     */
    public static function isDone($cate)
    {
        $db = DB::getConn();
        $uid = $_COOKIE['uid'];

        $stm = $db->prepare('select * from Answers where uid=:uid and cate=:cate');
        $stm->bindParam(':uid', $uid);
        $stm->bindParam(':cate', $cate);
        $stm->execute();
        $rs = $stm->fetchAll();

        return count($rs) > 0 ? true : false;
    }

    /**
     * @return bool
     * @param Answers $ans
     */
    public static function submitTest($ans)
    {
        $db = DB::getConn();
        $uid = $ans->getUid();
        $cate = $ans->getCate();
        $res = $ans->getRes();

        $stm = $db->prepare('insert into Answers (uid, cate, ans, time) values (:uid, :cate, :ans, date("now"))');
        $stm->bindParam(':uid', $uid);
        $stm->bindParam(':cate', $cate);
        $stm->bindParam(':ans', $res);
        $stm->execute();

    }

    /**
     * @return bool
     * @param int $id
     */
    public static function remove($id)
    {
        $db = DB::getConn();

        $stm = $db->prepare('delete from Option where question=:id');
        $stm->bindParam(':id', $id);
        $stm->execute();

        $stm = $db->prepare('delete from Question where id=:id');
        $stm->bindParam(':id', $id);
        $stm->execute();
    }

    /**
     * @return Question[]
     * @param int $id
     */
    public static function getQuestionsByCategory($id)
    {
        $db = DB::getConn();

        $stm = $db->prepare('select * from Question where category = :id');
        $stm->bindParam(':id', $id);

        $stm->execute();
        $rss = $stm->fetchAll();
        $arr = [];

        foreach ($rss as $rs) {

            $q = new Question($rs['category'], $rs['point'], $rs['title'], $rs['explain']);
            $q->setId($rs['id']);

            $stm = $db->prepare('select * from Option where question = :id');
            $idd = $q->getId();
            $stm->bindParam(':id', $idd);

            $stm->execute();
            $opts = $stm->fetchAll();

            foreach ($opts as $o) {
                $opt = new Option($o['question'], $o['title'], $o['isCorrect']);
                $opt->setId($o['id']);
                $q->addOpt($opt);
            }

            $arr[] = $q;
        }

        return $arr;
    }

    /**
     * @return Question[]
     */

    public static function getAll()
    {
        $db = DB::getConn();

        $stm = $db->prepare('select * from Question');

        $stm->execute();
        $rss = $stm->fetchAll();
        $arr = [];

        foreach ($rss as $rs) {

            $q = new Question($rs['category'], $rs['point'], $rs['title'], $rs['explain']);
            $q->setId($rs['id']);

            $stm = $db->prepare('select * from Option where question = :id');

            $idd = $q->getId();
            $stm->bindParam(':id', $idd);

            $stm->execute();
            $opts = $stm->fetchAll();

            foreach ($opts as $o) {
                $opt = new Option($o['question'], $o['title'], $o['isCorrect']);
                $opt->setId($o['id']);
                $q->addOpt($opt);
            }

            $arr[] = $q;
        }

        return $arr;
    }

    /**
     * @return Question
     * @param int $id
     */
    public static function get($id)
    {
        $db = DB::getConn();

        $stm = $db->prepare('select * from Question where id = :id');
        $stm->bindParam(':id', $id);

        $stm->execute();
        $rs = $stm->fetchAll()[0];

        $q = new Question($rs['category'], $rs['point'], $rs['title'], $rs['explain']);
        $q->setId($id);

        $stm = $db->prepare('select * from Option where question = :id');
        $stm->bindParam(':id', $id);

        $stm->execute();
        $arr = $stm->fetchAll();

        foreach ($arr as $o) {
            $opt = new Option($o['question'], $o['title'], $o['isCorrect'] ? true : false);
            $opt->setId($o['id']);
            $q->addOpt($opt);
        }

        return $q;
    }

    /**
     * @return array
     * @param int $id
     */
    public static function getOptionsByID($id)
    {
        $db = DB::getConn();

        $stm = $db->prepare('select * from Option where id = :id');
        $stm->bindParam(':id', $id);

        $stm->execute();
        return $stm->fetchAll();
    }

    /**
     * @return int
     * @param Question $q
     */
    public static function addQuestion($q)
    {

        $db = DB::getConn();

        $stm = $db->prepare('insert into Question (title, category, point, explain) values (:title, :cate, :point, :explain)');
        $stm->bindParam(':title', $q->getTitle());
        $stm->bindParam(':cate', $q->getCategory());
        $stm->bindParam(':point', $q->getPoint());
        $stm->bindParam(':explain', $q->getExplain());

        $stm->execute();

        return QuestionCtrl::getLastID();
    }

    /**
     * @return int
     * @param Question $q
     */
    public static function updateQuestion($q)
    {

        $db = DB::getConn();

        $stm = $db->prepare('update Question set title=:title, category=:cate, point=:point, explain=:explain where id=:id');
        $stm->bindParam(':title', $q->getTitle());
        $stm->bindParam(':cate', $q->getCategory());
        $stm->bindParam(':point', $q->getPoint());
        $stm->bindParam(':explain', $q->getExplain());
        $stm->bindParam(':id', $q->getId());

        $stm->execute();

        return QuestionCtrl::getLastID();
    }

    /**
     * @return int
     */
    public static function getLastID()
    {

        $db = DB::getConn();

        $stm = $db->prepare('SELECT id FROM Question ORDER BY id DESC LIMIT 1;');

        $stm->execute();

        return $stm->fetchAll()[0]['id'];

    }

    /**
     * @return bool
     * @param Option $o
     */
    public static function addOption($o)
    {

        $db = DB::getConn();

        $stm = $db->prepare('insert into Option (question, title, isCorrect) values (:question, :title, :correct)');
        $stm->bindParam(':question', $o->getQuestion());
        $stm->bindParam(':title', $o->getText());
        $stm->bindParam(':correct', $o->isCorrect());

        $stm->execute();
    }

    /**
     * @return bool
     * @param Option $o
     */
    public static function updateOption($o)
    {

        $db = DB::getConn();

        $stm = $db->prepare('update Option set title=:title, isCorrect=:correct where id=:id');
        $stm->bindParam(':id', $o->getId());
        $stm->bindParam(':title', $o->getText());
        $stm->bindParam(':correct', $o->isCorrect());

        $stm->execute();
    }

    /**
     * @return bool
     */
    public static function addCate($name)
    {
        $db = DB::getConn();

        $stm = $db->prepare('insert into QuestionCategory (name) values (:name)');
        $stm->bindParam(':name', $name);

        return $stm->execute();
    }

    /**
     * @return bool
     * @param int $id
     */
    public static function check($id, $s)
    {
        if (QuestionCtrl::has($id))
            return QuestionCtrl::get($id)->checkRs($s);
        else
            return false;
    }

}