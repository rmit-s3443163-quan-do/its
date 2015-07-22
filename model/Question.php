<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 10/07/15
 * Time: 8:25 AM
 */

require_once('./model/Option.php');

class Question {

    private $id=-1;
    private $category=0;
    private $point=0;
    private $title='';
    private $explain='';
    /** @var $opts Option[] */
    private $opts = [];

    function __construct($category, $point, $title, $explain)
    {
        $this->category = strip_tags($category);
        $this->point = strip_tags($point);
        $this->title = strip_tags($title, '<img>');
        $this->explain = strip_tags($explain, '<img>');
    }

    /**
     * @param Option $opt
     */
    public function addOpt($opt) {
        $this->opts[] = $opt;
    }

    /**
     * @return Option[]
     */
    public function getOpts()
    {
        return $this->opts;
    }

    /**
     * @param Option[] $opts
     */
    public function setOpts($opts)
    {
        $this->opts = $opts;
    }

    /**
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getCategoryName()
    {
        if ($this->category == 1)
            return 'Pre-Question';
        else
            return 'Post-Question';

    }

    /**
     * @param int $category
     */
    public function setCategory($category)
    {
        $this->category = strip_tags($category);
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
        $this->point = strip_tags($point);
    }

    /**
     * @return string
     */
    public function getExplain()
    {
        if (!isset($this->explain) || $this->explain=='')
            return 'not set yet';
        else
            return $this->explain;
    }

    /**
     * @param string $explain
     */
    public function setExplain($explain)
    {
        $this->explain = strip_tags($explain);
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
        $this->id = strip_tags($id);
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
    public function isCate($c)
    {
        if ($this->category == $c)
            return 'checked';
        else
            return '';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        if (!isset($this->title) || $this->title=='')
            return 'not set yet';
        else
            return $this->title;
    }

    /**
     * @return string
     */
    public function getShortTitle()
    {
        return (strlen($this->title)<100)?$this->title:substr($this->title,0,100).'..';
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = strip_tags($title);
    }

}