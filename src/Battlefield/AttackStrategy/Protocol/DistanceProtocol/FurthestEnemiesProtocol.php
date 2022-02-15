<?php

namespace App\Battlefield\AttackStrategy\Protocol\DistanceProtocol;

use App\Entity\Coordinates;
use App\Entity\Target;

class FurthestEnemiesProtocol extends DistanceAbstractProtocol
{
    protected function calculatePreferredEnemyDistance(array $targets, Coordinates $origin): float
    {
        $furthestEnemyDistance = -1;

        foreach ($targets as $target) {
            if (!$target instanceof Target) {
                continue;
            }

            $currentDistance = $target->getDistance($origin);

            if ($furthestEnemyDistance == -1 || $currentDistance > $furthestEnemyDistance) {
                $furthestEnemyDistance = $target->getDistance($origin);
            }
        }

        return $furthestEnemyDistance;
    }

    public function getIncompatibleProtocols(): array
    {
        return [
            ClosestEnemiesProtocol::class,
        ];
    }
}
