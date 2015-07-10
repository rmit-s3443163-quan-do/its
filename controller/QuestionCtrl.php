<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 10/07/15
 * Time: 8:51 AM
 */

require_once('./model/Question.php');

class QuestionCtrl {

    /** @var Question[] $questions **/
    public static $questions = [];

    /**
     * @return bool
     * @param int $id
     */
    public static function check($id, $s) {
        if (QuestionCtrl::has($id))
            return QuestionCtrl::get($id)->checkRs($s);
        else
            return false;
    }

    public static function getJSON($id) {
        if (QuestionCtrl::get($id)!=null)
            return QuestionCtrl::get($id)->toJSON();
        else
            return null;
    }

    /**
     * @return Question
     * @param int $id
     */
    public static function get($id) {
        if (QuestionCtrl::has($id))
            return QuestionCtrl::$questions[$id];
        else
            return null;
    }

    /**
     * @return int
     */
    public static function size() {
        return sizeof(QuestionCtrl::$questions);
    }

    /**
     * @return boolean
     * @param int $id
     */
    public static function has($id) {
        return isset(QuestionCtrl::$questions[$id]);
    }

    /**
     * @param Question $q
     */
    public static function add($q) {
        if (!QuestionCtrl::has($q->getId()))
            QuestionCtrl::$questions[$q->getId()] = $q;
    }

    public static function init() {
        $q1 = new Question(1, 0);
        $q1->setTitle('A good OO design should aim for:');
        $q1->setExplain('Because Low Coupling and High Cohesion is good. Lorem ipsum et sudo.');
        $q1->addAlt('A', new Option('Low coupling and Low Cohesion', false));
        $q1->addAlt('B', new Option('High coupling and High Cohesion', false));
        $q1->addAlt('C', new Option('High Coupling and Low Cohesion', false));
        $q1->addAlt('D', new Option('Low Coupling and High Cohesion', true));

        QuestionCtrl::add($q1);

        $q1 = new Question(2, 0);
        $q1->setTitle('Sequence diagrams are best suited for:');
        $q1->setExplain('Because Low Coupling and High Cohesion is good. Lorem ipsum et sudo.');
        $q1->addAlt('A', new Option('showing behaviours involving loops', false));
        $q1->addAlt('B', new Option('showing behaviours involving alternatives', false));
        $q1->addAlt('C', new Option('showing behaviours involving optional parts', false));
        $q1->addAlt('D', new Option('showing collaboration between objects', true));

        QuestionCtrl::add($q1);

        $q1 = new Question(3, 0);
        $q1->setTitle('Sequence diagrams are best suited for:');
        $q1->setExplain('Because Low Coupling and High Cohesion is good. Lorem ipsum et sudo.');
        $q1->addAlt('A', new Option('showing behaviours involving loops', false));
        $q1->addAlt('B', new Option('showing behaviours involving alternatives', false));
        $q1->addAlt('C', new Option('showing behaviours involving optional parts', false));
        $q1->addAlt('D', new Option('showing collaboration between objects', true));

        QuestionCtrl::add($q1);
    }

}