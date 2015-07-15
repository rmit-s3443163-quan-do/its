<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 15/07/15
 * Time: 7:16 PM
 */

class Result {

    private $ktext = '';
    private $res = '';
    private $point = 0;
    private $mark = 0;

    function __construct($ktext, $res, $point)
    {
        $this->ktext = $ktext;
        $this->res = $res;
        $this->point = $point;
        if ($res == 'success')
            $this->mark = $point;
    }

    /**
     * @return int
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * @param int $mark
     */
    public function setMark($mark)
    {
        $this->mark = $mark;
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
     * @return string
     */
    public function getKtext()
    {
        return $this->ktext;
    }

    /**
     * @param string $ktext
     */
    public function setKtext($ktext)
    {
        $this->ktext = $ktext;
    }

    /**
     * @return string
     */
    public function getRes()
    {
        return $this->res;
    }

    /**
     * @param string $res
     */
    public function setRes($res)
    {
        $this->res = $res;
    }



} 