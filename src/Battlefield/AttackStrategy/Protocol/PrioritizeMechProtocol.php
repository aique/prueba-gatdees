<?php

namespace App\Battlefield\AttackStrategy\Protocol;

use App\Entity\Enemy;
use App\Entity\Target;

class PrioritizeMechProtocol extends AbstractProtocol
{
    protected function meetRequirements(Target $target): bool
    {
        return $target->hasEnemies(Enemy::MECH_TYPE);
    }

    public function getIncompatibleProtocols(): array
    {
        return [
            AvoidMechProtocol::class,
        ];
    }
}
