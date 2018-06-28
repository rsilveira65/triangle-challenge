<?php

namespace src\Sides;

/**
 * Class Side
 * @package src\Sides
 */
class Side
{
    private $length;

    /**
     * @param $length
     * @return int
     */
    public function setLength($length)
    {
        return $this->length = intval($length);
    }

    public function getLength()
    {
        return $this->length;
    }
}