<?php

namespace App\Entity;

class Target
{
    public const MAX_PRIORITY = 1;

    private Coordinates $coordinates;
    private Enemy $enemy;
    private int $allies;
    private int $priority;

    public function __construct(
        Coordinates $coordinates,
        Enemy $enemy,
        ?int $allies = 0
    ) {
        $this->coordinates = $coordinates;
        $this->enemy = $enemy;
        $this->allies = $allies;
        $this->priority = -1;
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

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }

    public function getDistance(Coordinates $origin): float
    {
        $x = $this->getCoordinates()->getX();
        $y = $this->getCoordinates()->getY();

        return sqrt(pow(($origin->getX() - $x), 2) + pow(($origin->getY() - $y), 2));
    }
}
