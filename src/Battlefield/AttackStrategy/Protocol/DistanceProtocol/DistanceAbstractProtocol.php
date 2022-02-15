<?php

namespace App\Battlefield\AttackStrategy\Protocol\DistanceProtocol;

use App\Battlefield\AttackStrategy\Protocol\Protocol;
use App\Entity\Coordinates;
use App\Entity\Target;

abstract class DistanceAbstractProtocol implements Protocol
{
    protected Coordinates $origin;

    public function __construct()
    {
        $this->origin = new Coordinates(0, 0);
    }

    public function prioritizeTargets(array $targets): array
    {
        $preferredDistance = $this->calculatePreferredEnemyDistance($targets, $this->origin);

        foreach ($targets as $target) {
            if (!$target instanceof Target) {
                continue;
            }

            if ($target->getDistance($this->origin) == $preferredDistance) {
                $target->setPriority(Target::MAX_PRIORITY);
            }
        }

        return $targets;
    }

    abstract protected function calculatePreferredEnemyDistance(array $targets, Coordinates $origin): float;
}