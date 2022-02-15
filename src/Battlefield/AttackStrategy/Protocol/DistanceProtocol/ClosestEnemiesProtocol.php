<?php

namespace App\Battlefield\AttackStrategy\Protocol\DistanceProtocol;

use App\Entity\Coordinates;
use App\Entity\Target;

class ClosestEnemiesProtocol extends DistanceAbstractProtocol
{
    protected function calculatePreferredEnemyDistance(array $targets, Coordinates $origin): float
    {
        $closestEnemyDistance = -1;

        foreach ($targets as $target) {
            if (!$target instanceof Target) {
                continue;
            }

            $currentDistance = $target->getDistance($origin);

            if ($closestEnemyDistance == -1 || $currentDistance < $closestEnemyDistance) {
                $closestEnemyDistance = $target->getDistance($origin);
            }
        }

        return $closestEnemyDistance;
    }

    public function getIncompatibleProtocols(): array
    {
        return [
            FurthestEnemiesProtocol::class,
        ];
    }
}
