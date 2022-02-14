<?php

namespace App\Entity\Protocol;

class ClosestEnemiesProtocol implements Protocol
{
    public function prioritizeTargets(array $targets): array
    {
        return $targets;
    }
}
