<?php

namespace App\Battlefield\AttackStrategy\Protocol\DistanceProtocol;

use App\Battlefield\AttackStrategy\Protocol\AbstractProtocol;
use App\Entity\Coordinates;
use App\Entity\Target;

abstract class DistanceAbstractProtocol extends AbstractProtocol
{
    protected Coordinates $origin;
    protected float $preferredDistance;

    public function __construct()
    {
        $this->origin = new Coordinates(0, 0);
    }

    protected function initialize(array $targets): void
    {
        $this->preferredDistance = $this->calculatePreferredEnemyDistance($targets, $this->origin);
    }

    protected function meetRequirements(Target $target): bool
    {
        return $target->getDistance($this->origin) == $this->preferredDistance;
    }

    abstract protected function calculatePreferredEnemyDistance(array $targets, Coordinates $origin): float;
}
