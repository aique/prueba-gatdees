<?php

namespace App\Battlefield\AttackStrategy\Protocol;

use App\AttackStrategy\Protocol\Protocols;
use App\Entity\Target;

interface Protocol
{
    /**
     * Devuelve una lista de objetivos
     * con la prioridad modificada, de manera que se
     * encontrarán priorizados utilizando el algoritmo del propio protocolo.
     *
     * @param Target[] $targets
     *
     *      Lista de objetivos original a priorizar.
     *
     * @return Target[]
     *
     *      Lista priorizada de objetivos.
     */
    public function prioritizeTargets(array $targets): array;

    /**
     * Obtiene el listado de protocolos incompatibles con el actual.
     *
     * @return Protocols[]
     */
    public function getIncompatibleProtocols(): array;
}
