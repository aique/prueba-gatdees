<?php

namespace App\Entity\Battlefield;

class Coordinates
{
    private string $x;
    private string $y;

    public function __construct(string $x, string $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): string
    {
        return $this->x;
    }

    public function getY(): string
    {
        return $this->y;
    }
}