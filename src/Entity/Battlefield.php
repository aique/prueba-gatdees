<?php

namespace App\Entity;

class Battlefield
{
    /**
     * @var Target[]
     */
    private array $targets;

    private AttackStrategy $attackStrategy;

    public function __construct(AttackStrategy $attackStrategy)
    {
        $this->targets = [];
        $this->attackStrategy = $attackStrategy;
    }

    public function addTarget(Target $target): void
    {
        $this->targets[] = $target;
    }

    /**
     * @return Target[]
     */
    public function getTargets(): array
    {
        return $this->targets;
    }

    public function nextTarget(): ?Target
    {
        $prioritizedTargets = $this->attackStrategy->prioritizeTargets($this->targets);

        if (empty($prioritizedTargets)) {
            return null;
        }

        return $prioritizedTargets[0];
    }
}
