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

    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

    public function getEnemy(): Enemy
    {
        return $this->enemy;
    }

    public function getAllies(): int
    {
        return $this->allies;
    }
}
