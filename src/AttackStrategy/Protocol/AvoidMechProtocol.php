<?php

namespace App\AttackStrategy\Protocol;

class AvoidMechProtocol implements Protocol
{
    public function prioritizeTargets(array $targets): array
    {
        return $targets;
    }
}
