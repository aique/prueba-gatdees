<?php

namespace App\Battlefield\AttackStrategy\Protocol;

use App\AttackStrategy\Protocol\Protocols;
use App\Entity\Target;

interface Protocol
{
    /**
     * Devuelve una lista
     * de objetivos que cumplen con
     * los requisitos del protocolo de ataque.
     *
     * @param Target[] $targets
     *
     *      Lista de objetivos original a filtrar.
     *
     * @return Target[]
     *
     *      Lista filtrada de objetivos que cumplen con el protocolo.
     */
    public function prioritizeTargets(array $targets): array;

    /**
     * Obtiene el listado de protocolos incompatibles con el actual.
     *
     * @return Protocols[]
     */
    public function getIncompatibleProtocols(): array;
}
