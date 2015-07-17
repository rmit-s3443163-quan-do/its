<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 16/07/15
 * Time: 2:54 PM
 */
class Survey {
    private $id=0;
    private $title='';
    private $show=1;
    private $percent=0;
    private $count=0;

    /**
     * Survey constructor.
     * @param string $title
     * @param int $show
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }



    /**
     * @return int
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * @param int $percent
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;
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
    public function getShow()
    {
        return $this->show;
    }

    /**
     * @param int $show
     */
    public function setShow($show)
    {
        $this->show = $show;
    }


}