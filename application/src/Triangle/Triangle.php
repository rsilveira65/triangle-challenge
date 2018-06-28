<?php

namespace src\Triangle;

use src\Helper\CommandLineError;
use src\Sides\Side;

/**
 * Class Triangle
 * @package src\Triangle
 */
class Triangle
{
    /**
     * Equilateral Triangle
     * Three equal sides
     * Three equal angles, always 60°
     */
    const EQUILATERAL = 3;

    /**
     * Isosceles Triangle
     * Two equal sides
     * Two equal angles
     */
    const ISOSCELES = 2;

    /**
     * Scalene Triangle
     * No equal sides
     * No equal angles
     */
    const SCALENE = 0;

    /**
     * @var string $type
     */
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
     * This method calculates the triangle type according with the given sides.
     */
    public function calculateType()
    {
        $lengths = [];
        /** @var Side $side */
        foreach ($this->sides as $side) {
            $lengths[] = $side->getLength();
        }

        if (count($lengths) != 3) {
            throw new \Error('Error, number of sides must be 3.', CommandLineError::FATAL_ERROR);
        }

        if (array_search(0, $lengths) !== false) {
            throw new \Error('Error, side can not be 0.', CommandLineError::FATAL_ERROR);
        }

        $sameLengthAmount = array_count_values($lengths);

        if (array_search(self::EQUILATERAL, $sameLengthAmount)) {
            $this->setType('equilateral');
            return;
        }

        if (array_search(self::ISOSCELES, $sameLengthAmount)) {
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