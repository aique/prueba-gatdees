<?php

namespace App\Battlefield\AttackStrategy\Protocol\EnemyTypeProtocol;

use App\Battlefield\AttackStrategy\Protocol\Protocol;
use App\Entity\Target;

abstract class EnemyTypeAbstractProtocol implements Protocol
{
    public function prioritizeTargets(array $targets): array
    {
        $preferredNumEnemies = $this->calculatePreferredNumEnemies($targets);

        foreach ($targets as $target) {
            if (!$target instanceof Target) {
                continue;
            }

            if ($target->getNumEnemies($this->preferredEnemyType()) == $preferredNumEnemies) {
                $target->setPriority(Target::MAX_PRIORITY);
            }
        }

        return $targets;
    }

    abstract protected function calculatePreferredNumEnemies(array $targets): int;
    abstract protected function preferredEnemyType(): string;
}