<?php

namespace App\AttackStrategy\Protocol;

use App\Entity\Target;

interface Protocol
{
    /**
     * @param Target[] $targets
     * @return Target[]
     */
    public function prioritizeTargets(array $targets): array;
}
