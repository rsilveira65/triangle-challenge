<?php

namespace src\Triangle;

use src\Helper\CommandLineError;
use src\Sides\Side;
use src\Triangle\Triangle;

class TriangleBuilder implements TriangleBuilderInterface
{
    /**
     * @var Triangle $triangle
     */
    private $triangle;

    public function addSides($sides)
    {
        if (count($sides) != 3) {
            throw new \Error('Error, number of sides must be 3.', CommandLineError::FATAL_ERROR);
        }

        if (array_search(0, $sides) !== false) {
            throw new \Error('Error, side can not be 0.', CommandLineError::FATAL_ERROR);
        }

        foreach ($sides as $index => $sideLength) {
            /** @var Side $side */
            $side = new Side();
            $side->setLength($sideLength);

            $this->triangle->setSide($index, $side);
        }
    }

    /**
     * @return $this
     */
    public function createTriangle()
    {
        $this->triangle = new Triangle();

        return $this;
    }

    /**
     * @return \src\Triangle\Triangle
     */
    public function getTriangle(): Triangle
    {
        return $this->triangle;
    }
}