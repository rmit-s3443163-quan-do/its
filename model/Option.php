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
        $this->question = strip_tags($question, '<img>') ;
        $this->correct = $correct==1?true:false;
        $this->text = strip_tags($text, '<img>');
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
        $this->id = strip_tags($id);
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
        $this->question = strip_tags($question);
    }

    /**
     * @return boolean
     */
    public function isCorrect()
    {
        return $this->correct;
    }

    /**
     * @return string
     */
    public function isCorrectText()
    {
        return $this->correct?'checked':'';
    }

    /**
     * @param boolean $correct
     */
    public function setCorrect($correct)
    {
        $this->correct = strip_tags($correct);
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
        $this->text = strip_tags($text);
    }

}