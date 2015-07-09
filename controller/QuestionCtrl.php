<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 10/07/15
 * Time: 8:51 AM
 */

require_once('./model/Question.php');

class QuestionCtrl {

    public static $questions = [];

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
        $q1 = new Question(12312, 0);
        $q1->setTitle('A good OO design should aim for:');
        $q1->addAlt(new Option('A. Low coupling and Low Cohesion', false));
        $q1->addAlt(new Option('B. High coupling and High Cohesion', false));
        $q1->addAlt(new Option('C. High Coupling and Low Cohesion', false));
        $q1->addAlt(new Option('D. Low Coupling and High Cohesion', true));

        QuestionCtrl::add($q1);

        $q1 = new Question(32321, 0);
        $q1->setTitle('Sequence diagrams are best suited for:');
        $q1->addAlt(new Option('A. showing behaviours involving loops', false));
        $q1->addAlt(new Option('B. showing behaviours involving alternatives', false));
        $q1->addAlt(new Option('C. showing behaviours involving optional parts', false));
        $q1->addAlt(new Option('D. showing collaboration between objects', true));

        QuestionCtrl::add($q1);
    }

}