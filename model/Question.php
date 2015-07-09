<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 10/07/15
 * Time: 8:25 AM
 */

class Option {
    private $text = '';
    private $correct = false;

    function __construct($text, $correct)
    {
        $this->correct = $correct;
        $this->text = $text;
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

class Question {
    private $id=-1;
    private $type=0;
    private $title='';
    private $alts= [];

    function __construct($id, $type)
    {
        $this->id = $id;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function toJSON() {
        $cs = [];
        $alts = [];

        foreach ($this->getAlts() as $a) {
            array_push($alts, array(
                'text' => $a->getText()
            ));
        }

        $temp = array(
            'type' => $this->getType(),
            'title' => $this->getTitle(),
            'alts' => $alts
        );

        array_push($cs, $temp);

        $json = array(
            'records' => $cs
        );

        return json_encode($json);
    }

    /**
     * @param Option $opt
     */
    public function addAlt($opt) {
        array_push($this->alts, $opt);
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
     * @return Option[]
     */
    public function getAlts()
    {
        return $this->alts;
    }

    /**
     * @param Option[] $alts
     */
    public function setAlts($alts)
    {
        $this->alts = $alts;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}