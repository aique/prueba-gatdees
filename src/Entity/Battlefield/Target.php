<?php

namespace App\Entity\Battlefield;

class Target
{
    private Coordinates $coordinates;
    private Enemy $enemy;
    private int $allies;

    public function __construct(
        Coordinates $coordinates,
        Enemy $enemy,
        ?int $allies = 0
    ) {
        $this->coordinates = $coordinates;
        $this->enemy = $enemy;
        $this->allies = $allies;
    }
}