<?php

namespace App\Battlefield\AttackStrategy\Protocol;

use App\Entity\Target;

class AvoidCrossfireProtocol extends AbstractProtocol
{
    protected function meetRequirements(Target $target): bool
    {
        return empty($target->getAllies());
    }

    public function getIncompatibleProtocols(): array
    {
        return [];
    }
}
