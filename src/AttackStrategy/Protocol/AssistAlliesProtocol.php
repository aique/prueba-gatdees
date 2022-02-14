<?php

namespace App\AttackStrategy\Protocol;

class AssistAlliesProtocol implements Protocol
{
    public function prioritizeTargets(array $targets): array
    {
        return $targets;
    }

    public function getIncompatibleProtocols(): array
    {
        return [];
    }
}
