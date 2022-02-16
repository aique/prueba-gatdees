<?php

namespace App\Battlefield\AttackStrategy\Protocol;

use App\Entity\Target;

abstract class AbstractProtocol implements Protocol
{
    public function prioritizeTargets(array $targets): array
    {
        $prioritizedTargets = [];

        $this->initialize($targets);

        foreach ($targets as $target) {
            if (!$target instanceof Target) {
                continue;
            }

            if ($this->meetRequirements($target)) {
                $prioritizedTargets[] = $target;
            }
        }

        return $prioritizedTargets;
    }

    /**
     * Realiza tareas de
     * inicialización en base a
     * la colección de objetivos de ataque.
     *
     * Será sobreescrito en función de sus necesidades.
     *
     * @param Target[] $targets
     * @return void
     */
    protected function initialize(array $targets): void
    {
    }

    /**
     * Condición que debe
     * cumplir un objetivo de ataque para
     * satisfacer los requerimientos del protocolo.
     *
     * @param Target $target
     * @return bool
     */
    abstract protected function meetRequirements(Target $target): bool;
}