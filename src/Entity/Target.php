<?php

namespace App\Entity;

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

    public function getDistance(Coordinates $origin): float
    {
        $x = $this->getCoordinates()->getX();
        $y = $this->getCoordinates()->getY();

        return sqrt(pow(($origin->getX() - $x), 2) + pow(($origin->getY() - $y), 2));
    }

    public function hasEnemies(string $type): bool
    {
        return $this->getEnemy()->hasType($type) && $this->getEnemy()->getNumber() > 0;
    }
}
