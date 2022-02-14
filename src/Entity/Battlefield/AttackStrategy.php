<?php

namespace App\Entity\Battlefield;

use App\Entity\Protocol\Protocol;

class AttackStrategy
{
    /**
     * @var Protocol[]
     */
    private array $protocols;

    public function __construct()
    {
        $this->protocols = [];
    }

    public function addProtocol(Protocol $protocol): void
    {
        $this->protocols[] = $protocol;
    }

    /**
     * @param Target[] $targets
     * @return Target[]
     */
    public function prioritizeTargets(array $targets): array
    {
        foreach ($this->protocols as $protocol) {
            if (!$protocol instanceof Protocol) {
                continue;
            }

            $targets = $protocol->prioritizeTargets($targets);
        }

        return $targets;
    }
}
