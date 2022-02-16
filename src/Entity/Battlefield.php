<?php

namespace App\Entity;

class Battlefield
{
    private const DISCARDED_DISTANCE = 100;

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

    /**
     * Indica si el objetivo cumple
     * con los criterios de descarte y por lo
     * tanto no ha de ser añadido al campo de batalla.
     */
    private function isDiscarded(Target $target): bool
    {
        $origin = new Coordinates(0, 0);

        return $target->getDistance($origin) > self::DISCARDED_DISTANCE;
    }

    public function getTargets(): array
    {
        return $this->targets;
    }

    /**
     * Obtiene los objetivos de
     * ataque que cumplen con los protocolos
     * y simplemente retorna el primero de ellos.
     */
    public function nextTarget(): ?Target
    {
        $prioritizedTargets = $this->attackStrategy->prioritizeTargets($this->targets);

        if (empty($prioritizedTargets)) {
            return null;
        }

        return $prioritizedTargets[0];
    }
}
