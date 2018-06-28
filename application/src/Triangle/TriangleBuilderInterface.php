<?php

namespace src\Triangle;

/**
 * Interface TriangleBuilderInterface
 * @package src\Triangle
 */
interface TriangleBuilderInterface
{
    public function createTriangle();
    public function addSides($sides);
    public function getTriangle(): Triangle;
}