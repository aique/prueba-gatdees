<?php

namespace App\AttackStrategy\Protocol;

class AvoidCrossfireProtocol implements Protocol
{
    public function prioritizeTargets(array $targets): array
    {
        return $targets;
    }
}
