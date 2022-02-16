<?php

namespace App\Entity;

class Battlefield
{
    private const DISCARDED_DISTANCE = 100;

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
        if (!$this->isDiscarded($target)) {
            $this->targets[] = $target;
        }
    }

    private function isDiscarded(Target $target): bool
    {
        $origin = new Coordinates(0, 0);

        return $target->getDistance($origin) > self::DISCARDED_DISTANCE;
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
