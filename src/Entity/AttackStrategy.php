<?php

namespace App\Entity;

use App\AttackStrategy\Protocol\Protocol;

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
     * @return Protocol[]
     */
    public function getProtocols(): array
    {
        return $this->protocols;
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
