<?php

namespace src\Triangle;
use src\Sides\Side;

/**
 * Created by PhpStorm.
 * User: rsilveira
 * Date: 28/06/18
 * Time: 10:28
 */
class Triangle
{
    const EQUILATERAL = 3;
    const ISOSCELES = 2;
    const SCALENE = 0;
    private $type;

    /**
     * @var array
     */
    private $sides = [];

    /**
     * @param $key
     * @param Side $side
     */
    public function setSide($key, Side $side)
    {
        $this->sides[$key] = $side;
    }

    /**
     * @return array
     */
    public function getSides()
    {
        return $this->sides;
    }

    /**
     * TODO
     */
    public function calculateType()
    {
        $lengths = [];
        /** @var Side $side */
        foreach ($this->sides as $side) {
            $lengths[] = $side->getLength();
        }

        if (count($lengths) < 3) {
            //TODO
        }

        $result = array_count_values($lengths);

        if (array_search(self::EQUILATERAL, $result)) {
            $this->setType('equilateral');
            return;
        }

        if (array_search(self::ISOSCELES, $result)) {
            $this->setType('isosceles');
            return;
        }

        $this->setType('scalene');
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     */
    private function setType($type)
    {
        $this->type = $type;
    }
}