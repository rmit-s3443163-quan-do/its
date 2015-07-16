<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 16/07/15
 * Time: 2:58 PM
 */
class Vote {

    private $survey=0;
    private $uid=0;
    private $rate=0;
    private $comment='';

    /**
     * Vote constructor.
     * @param int $survey
     * @param int $rate
     * @param int $uid
     * @param string $comment
     */
    public function __construct($survey, $uid, $rate, $comment)
    {
        $this->survey = $survey;
        $this->uid = $uid;
        $this->rate = $rate;
        $this->comment = $comment;
    }


    /**
     * @return int
     */
    public function getSurvey()
    {
        return $this->survey;
    }

    /**
     * @param int $survey
     */
    public function setSurvey($survey)
    {
        $this->survey = $survey;
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
     * @return int
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }



}