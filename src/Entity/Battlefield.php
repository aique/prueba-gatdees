<?php

namespace App\Entity;

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

    /**
     * Reordena sus objetivos
     * de ataque para priorizarlos
     * en función de una estrategia.
     */
    public function prioritizeTargets(AttackStrategy $attackStrategy): void
    {
        $this->targets = $attackStrategy->prioritizeTargets($this->targets);
    }

    public function nextTarget(): ?Target
    {
        if (empty($this->targets)) {
            return null;
        }

        return $this->targets[0];
    }
}
