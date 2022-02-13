<?php

namespace App\Entity\Battlefield;

class Battlefield
{
    /**
     * @var Target[]
     */
    private array $targets;

    public function __construct()
    {
        $this->targets = [];
    }

    public function addTarget(Target $target): void {
        $this->targets[] = $target;
    }

    /**
     * @return Target[]
     */
    public function getTargets(): array
    {
        return $this->targets;
    }

    public function hasTargets(): bool
    {
        return !empty($this->targets);
    }

    public function prioritizeTargets(AttackStrategy $attackStrategy): void
    {
        $this->targets = $attackStrategy->prioritizeTargets($this->targets);
    }

    public function nextTarget(): ?Target {
        if (empty($this->targets)) {
            return null;
        }

        return $this->targets[0];
    }
}