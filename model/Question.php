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
    private $explain='';
    private $alts= [];

    function __construct($id, $type)
    {
        $this->id = $id;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getExplain()
    {
        return $this->explain;
    }

    /**
     * @param string $explain
     */
    public function setExplain($explain)
    {
        $this->explain = $explain;
    }

    public function getRs() {
        $s = 'Correct answer is: ';
        foreach ($this->getAlts() as $key=>$a) {
            if ($a->isCorrect())
                $s .= $key . ' ';
        }
        return $s;
    }

    /**
     * @return bool
     */
    public function checkRs($s) {

        foreach ($this->getAlts() as $key=>$a) {
            if ($a->isCorrect()) {
                if (!preg_match('/' . $key . ',/', $s))
                    return false;
                else
                    $s = str_replace($key.',','',$s);
            }

            if (!$a->isCorrect() && preg_match('/' . $key . '/', $s))
                return false;
        }
        if (strlen($s)==0)
            return true;
        else
            return false;
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
    public function addAlt($key, $opt) {
        $this->alts[$key] = $opt;
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