<?php

namespace App\Battlefield\AttackStrategy\Protocol;

class FurthestEnemiesProtocol implements Protocol
{
    public function prioritizeTargets(array $targets): array
    {
        return $targets;
    }

    public function getIncompatibleProtocols(): array
    {
        return [
            ClosestEnemiesProtocol::class,
        ];
    }
}
