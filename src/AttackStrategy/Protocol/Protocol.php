<?php

namespace App\AttackStrategy\Protocol;

use App\Entity\Target;

interface Protocol
{
    /**
     * Devuelve una lista de objetivos
     * con la posición modificada, de manera que se
     * encontrarán priorizados utilizando el algoritmo del propio protocolo.
     *
     * @param Target[] $targets
     *
     *      La lista de objetivos original.
     *
     * @return Target[]
     *
     *      La lista priorizada de objetivos.
     */
    public function prioritizeTargets(array $targets): array;

    /**
     * Obtiene el listado de protocolos incompatibles con el actual.
     *
     * @return Protocols[]
     */
    public function getIncompatibleProtocols(): array;
}
