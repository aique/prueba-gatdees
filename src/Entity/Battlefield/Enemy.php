<?php

namespace App\Entity\Battlefield;

class Enemy
{
    const SOLDIER_TYPE = 'soldier';
    const MECH_TYPE = 'mech';

    private string $type;
    private int $number;

    public function __construct(string $type, int $number)
    {
        $this->type = $type;
        $this->number = $number;
    }
}