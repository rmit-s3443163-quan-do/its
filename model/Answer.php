<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 15/07/15
 * Time: 3:24 PM
 */

class Answer {
    private $question = 0;
    private $answer = 0;
    private $point = 0;

    function __construct($question, $answer)
    {
        $this->answer = $answer;
        $this->question = $question;
    }

    /**
     * @return string
     */
    function getRes()
    {
        $s = $this->question.'_'.$this->answer.'_';
        $ans = explode('_',$this->answer)[0];

        $db = DB::getConn();

        $stm = $db->prepare('select isCorrect from Option where id=:id');
        $stm->bindParam(':id', $ans);
        $stm->execute();
        $rs = $stm->fetchAll();


        $s .= $rs[0][0]==1?'success':'danger';

        return $s;
    }

    /**
     * @return string
     */
    function toString()
    {
        return $this->question . '_' .$this->answer;
    }

    /**
     * @return int
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * @param int $point
     */
    public function setPoint($point)
    {
        $this->point = $point;
    }


    /**
     * @return bool
     */
    function isCorrect() {
        return true;
    }

    /**
     * @return int
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param int $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    /**
     * @return int
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param int $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

}

class Answers {
    private $uid = 0;
    private $cate = 0;
    /**
     * @var Answer[] $ans
     */
    private $ans = [];

    function __construct($uid, $cate)
    {
        $this->cate = $cate;
        $this->uid = $uid;
    }

    /**
     * @return string
     */
    function getRes() {
        $s = '';

        foreach ($this->ans as $a) {
            $s .= $a->getRes() . ',';
        }

        return substr($s, 0, strlen($s)-1);
    }

    /**
     * @return string
     */
    public function ansToString() {
        $s = '';

        /**
         * @var Answer $a
         */
        foreach ($this->ans as $a) {
            $s.= $a->toString() . ',';
        }

        return substr($s, 0, strlen($s)-1);
    }

    /**
     * @param Answer $a
     */
    function addAns($a) {
        $this->ans[] = $a;
    }

    /**
     * @return int
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param int $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     * @return array
     */
    public function getAns()
    {
        return $this->ans;
    }

    /**
     * @param Answer[] $ans
     */
    public function setAns($ans)
    {
        $this->ans = $ans;
    }

    /**
     * @return int
     */
    public function getCate()
    {
        return $this->cate;
    }

    /**
     * @param int $cate
     */
    public function setCate($cate)
    {
        $this->cate = $cate;
    }


} 