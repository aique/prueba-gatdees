<?php

namespace App\AttackStrategy\Protocol;

class PrioritizeMechProtocol implements Protocol
{
    public function prioritizeTargets(array $targets): array
    {
        return $targets;
    }

    public function getIncompatibleProtocols(): array
    {
        return [
            AvoidMechProtocol::class,
        ];
    }
}
