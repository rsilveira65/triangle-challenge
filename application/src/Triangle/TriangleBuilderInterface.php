<?php

/**
 * Created by PhpStorm.
 * User: rsilveira
 * Date: 28/06/18
 * Time: 10:26
 */
namespace src\Triangle;

interface TriangleBuilderInterface
{
    public function createTriangle();
    public function addSides($sides);
    public function getTriangle(): Triangle;
}