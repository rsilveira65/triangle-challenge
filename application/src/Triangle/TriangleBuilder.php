<?php

namespace src\Triangle;

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