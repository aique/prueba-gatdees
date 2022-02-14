<?php

namespace App\Entity;

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

    public function getType(): string
    {
        return $this->type;
    }

    public function getNumber(): int
    {
        return $this->number;
    }
}
