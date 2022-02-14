<?php

namespace App\Entity\Protocol;

use App\Entity\Battlefield\Target;

interface Protocol
{
    /**
     * @param Target[] $targets
     * @return Target[]
     */
    public function prioritizeTargets(array $targets): array;
}
