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
        $this->survey = strip_tags($survey);
        $this->uid = strip_tags($uid);
        $this->rate = strip_tags($rate);
        $this->comment = strip_tags($comment);
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
        $this->survey = strip_tags($survey);
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
        $this->uid = strip_tags($uid);
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
        $this->rate = strip_tags($rate);
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
        $this->comment = strip_tags($comment);
    }



}