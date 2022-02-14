<?php

namespace App\AttackStrategy\Protocol;

class FurthestEnemiesProtocol implements Protocol
{
    public function prioritizeTargets(array $targets): array
    {
        return $targets;
    }
}
