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
     * Reestablece la prioridad
     * de cada objetivo de ataque para
     * priorizarlos en función de una estrategia.
     */
    public function prioritizeTargets(AttackStrategy $attackStrategy): void
    {
        $this->targets = $attackStrategy->prioritizeTargets($this->targets);
    }

    public function nextTarget(): ?Target
    {
        foreach ($this->targets as $target) {
            if (!$target instanceof Target) {
                continue;
            }

            if ($target->getPriority() == Target::MAX_PRIORITY) {
                return $target;
            }
        }

        return null;
    }
}
