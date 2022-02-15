<?php

namespace App\Battlefield\AttackStrategy\Protocol;

use App\Entity\Coordinates;
use App\Entity\Target;

class ClosestEnemiesProtocol implements Protocol
{
    public function prioritizeTargets(array $targets): array
    {
        $origin = new Coordinates(0, 0);
        $closestEnemyDistance = $this->calculateClosestEnemyDistance($targets, $origin);

        foreach ($targets as $target) {
            if (!$target instanceof Target) {
                continue;
            }

            if ($target->getDistance($origin) == $closestEnemyDistance) {
                $target->setPriority(Target::MAX_PRIORITY);
            }
        }

        return $targets;
    }

    private function calculateClosestEnemyDistance(array $targets, Coordinates $origin): float
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
