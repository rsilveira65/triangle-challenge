<?php

namespace tests\Triangle;

use PHPUnit\Framework\TestCase;
use src\Triangle\Triangle;
use src\Triangle\TriangleBuilder;

/**
 * Class TriangleTest
 * @package test\Triangle
 */
class TriangleTest extends TestCase
{
    const EQUILATERAL = [20, 20, 20];
    const ISOSCELES = [18, 3, 18];
    const SCALENE = [33, 24, 12];

    public function testTriangleTypeScalene()
    {
        /** @var TriangleBuilder $triangleBuilder */
        $triangleBuilder = new TriangleBuilder();

        $triangleBuilder
            ->createTriangle()
            ->addSides(self::SCALENE);

        /** @var Triangle $triangle */
        $triangle = $triangleBuilder->getTriangle();
        $triangle->calculateType();

        $this->assertEquals(
            'scalene',
            $triangle->getType(),
            'Return of getType must be scalene.'
        );
    }

    public function testTriangleTypeIsosceles()
    {
        /** @var TriangleBuilder $triangleBuilder */
        $triangleBuilder = new TriangleBuilder();

        $triangleBuilder
            ->createTriangle()
            ->addSides(self::ISOSCELES);

        /** @var Triangle $triangle */
        $triangle = $triangleBuilder->getTriangle();
        $triangle->calculateType();

        $this->assertEquals(
            'isosceles',
            $triangle->getType(),
            'Return of getType must be isosceles.'
        );
    }

    public function testTriangleTypeEquilateral()
    {
        /** @var TriangleBuilder $triangleBuilder */
        $triangleBuilder = new TriangleBuilder();

        $triangleBuilder
            ->createTriangle()
            ->addSides(self::EQUILATERAL);

        /** @var Triangle $triangle */
        $triangle = $triangleBuilder->getTriangle();
        $triangle->calculateType();

        $this->assertEquals(
            'equilateral',
            $triangle->getType(),
            'Error, number of sides must be equilateral.'
        );
    }
}