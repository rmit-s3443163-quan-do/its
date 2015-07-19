<?php

/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 20/07/15
 * Time: 8:20 AM
 */
class Chart
{
    /** @var int[] $legends */
    private $legends = [];

    /**
     * Chart constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function hd()
    {
        $n = 0;
        foreach ($this->legends as $leg)
            if ($leg >= 80)
                $n ++;

        return $n;
    }

    /**
     * @return int
     */
    public function di()
    {
        $n = 0;
        foreach ($this->legends as $leg)
            if ($leg < 80 && $leg >= 70)
                $n ++;

        return $n;
    }

    /**
     * @return int
     */
    public function cr()
    {
        $n = 0;
        foreach ($this->legends as $leg)
            if ($leg >= 60 && $leg < 70)
                $n ++;

        return $n;
    }

    /**
     * @return int
     */
    public function pa()
    {
        $n = 0;
        foreach ($this->legends as $leg)
            if ($leg >= 50 && $leg < 60)
                $n ++;

        return $n;
    }

    /**
     * @return int
     */
    public function nn()
    {
        $n = 0;
        foreach ($this->legends as $leg)
            if ($leg < 50)
                $n ++;

        return $n;
    }

    /**
     * @return int[]
     */
    public function getLegends()
    {
        return $this->legends;
    }

    /**
     * @param int[] $legends
     */
    public function setLegends($legends)
    {
        $this->legends = $legends;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        $total = 0;
        foreach ($this->legends as $leg)
            $total += $leg;

        return $total;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return count($this->getLegends());
    }

    /**
     * @return int
     */
    public function getAverage()
    {
        if ($this->getCount()>0)
            return number_format($this->getTotal()/$this->getCount(), 1, '.', ',');
        else
            return 0;
    }

    /**
     * @return string
     */
    public function getAverageType()
    {
        $avg = $this->getAverage();
        if ($avg >= 80)
            return 'HD';
        else if ($avg >= 70 && $avg < 80)
            return 'DI';
        else if ($avg >= 60 && $avg < 70)
            return 'CR';
        else if ($avg >= 50 && $avg < 60)
            return 'PA';
        else if ($avg < 50)
            return 'NN';

    }

    /**
     * @return string
     */
    public function getAverageClass()
    {
        $avg = $this->getAverage();
        if ($avg >= 80)
            return 'primary';
        else if ($avg >= 70 && $avg < 80)
            return 'info';
        else if ($avg >= 60 && $avg < 70)
            return 'success';
        else if ($avg >= 50 && $avg < 60)
            return 'warning';
        else if ($avg < 50)
            return 'danger';

    }

}