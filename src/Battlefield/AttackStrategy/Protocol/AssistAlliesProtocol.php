<?php

namespace App\Battlefield\AttackStrategy\Protocol;

use App\Entity\Target;

class AssistAlliesProtocol extends AbstractProtocol
{
    protected function meetRequirements(Target $target): bool
    {
        return !empty($target->getAllies());
    }

    public function getIncompatibleProtocols(): array
    {
        return [];
    }

    public function getDependencies(): array
    {
        return [];
    }
}
