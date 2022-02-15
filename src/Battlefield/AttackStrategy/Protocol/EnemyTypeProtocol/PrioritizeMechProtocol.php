<?php

namespace App\Battlefield\AttackStrategy\Protocol\EnemyTypeProtocol;

use App\Entity\Enemy;
use App\Entity\Target;

class PrioritizeMechProtocol extends EnemyTypeAbstractProtocol
{
    protected function calculatePreferredNumEnemies(array $targets): int
    {
        $preferredNumEnemies = -1;

        foreach ($targets as $target) {
            if (!$target instanceof Target) {
                continue;
            }

            $currentNumEnemies = $target->getNumEnemies($this->preferredEnemyType());

            if ($preferredNumEnemies == -1 || $currentNumEnemies > $preferredNumEnemies) {
                $preferredNumEnemies = $currentNumEnemies;
            }
        }

        return $preferredNumEnemies;
    }

    protected function preferredEnemyType(): string
    {
        return Enemy::MECH_TYPE;
    }

    public function getIncompatibleProtocols(): array
    {
        return [
            AvoidMechProtocol::class,
        ];
    }
}
