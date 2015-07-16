<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 16/07/15
 * Time: 2:54 PM
 */
class Survey {
    private $id=0;
    private $title=0;
    private $show=1;

    /**
     * Survey constructor.
     * @param int $title
     * @param int $show
     */
    public function __construct($title, $show)
    {
        $this->title = $title;
        $this->show = $show;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param int $title
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