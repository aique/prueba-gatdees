<?php

namespace App\Battlefield\AttackStrategy\Protocol;

class ClosestEnemiesProtocol implements Protocol
{
    public function prioritizeTargets(array $targets): array
    {
        return $targets;
    }

    public function getIncompatibleProtocols(): array
    {
        return [
            FurthestEnemiesProtocol::class,
        ];
    }
}
