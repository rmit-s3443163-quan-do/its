<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 12/07/15
 * Time: 9:49 AM
 */

class Option {
    private $id=-1;
    private $question = -1;
    private $text = '';
    private $correct = false;

    function __construct($question, $text, $correct)
    {
        $this->question = $question;
        $this->correct = $correct==1?true:false;
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

    /**
     * @return boolean
     */
    public function isCorrect()
    {
        return $this->correct;
    }

    /**
     * @param boolean $correct
     */
    public function setCorrect($correct)
    {
        $this->correct = $correct;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

}