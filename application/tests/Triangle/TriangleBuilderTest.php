<?php
namespace tests\Triangle;

use PHPUnit\Framework\TestCase;
use src\Triangle\Triangle;
use src\Triangle\TriangleBuilder;

class TriangleBuilderTest extends TestCase
{
    public function testCanBuildTriangle()
    {
        /** @var TriangleBuilder $triangleBuilder */
        $triangleBuilder = new TriangleBuilder();
        $triangleBuilder
            ->createTriangle()
            ->addSides([1,2,3]);

        $this->assertInstanceOf(
            Triangle::class, $triangleBuilder->getTriangle(),
            'Return of getTriangle method must be an instance of Triangle.'
        );

        $this->assertNotNull(
            $triangleBuilder->getTriangle(),
            'Return of getTriangle method can not be null.'
        );
    }

    public function testErrorWhenWrongNumberSidesAdded()
    {
        /** @var TriangleBuilder $triangleBuilder */
        $triangleBuilder = new TriangleBuilder();
        $fail = false;

        try {
            $triangleBuilder
                ->createTriangle()
                ->addSides([1,2]);
        } catch(\Error $e) {
            $fail = true;
            $this->assertEquals($e->getMessage(), 'Error, number of sides must be 3.');
        }

        if (!$fail) $this->fail('No errors were thrown.');
    }

    public function testErrorWhenZeroNumberSidesAdded()
    {
        /** @var TriangleBuilder $triangleBuilder */
        $triangleBuilder = new TriangleBuilder();
        $fail = false;

        try {
            $triangleBuilder
                ->createTriangle()
                ->addSides([1,2,0]);
        } catch(\Error $e) {
            $fail = true;
            $this->assertEquals($e->getMessage(), 'Error, side can not be 0.');
        }

        if (!$fail) $this->fail('No errors were thrown.');
    }

}