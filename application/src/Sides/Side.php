<?php

namespace src\Sides;

/**
 * Created by PhpStorm.
 * User: rsilveira
 * Date: 28/06/18
 * Time: 10:27
 */
class Side
{
    private $length;

    public function setLength($length)
    {
        return $this->length = intval($length);
    }

    public function getLength()
    {
        return $this->length;
    }
}