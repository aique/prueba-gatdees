<?php

namespace App\Entity;

use App\Battlefield\AttackStrategy\Protocol\Protocol;

class AttackStrategy
{
    /**
     * @var Protocol[]
     */
    private array $protocols;

    public function __construct()
    {
        $this->protocols = [];
    }

    public function addProtocol(Protocol $protocol): void
    {
        $this->protocols[] = $protocol;
    }

    /**
     * @return Protocol[]
     */
    public function getProtocols(): array
    {
        return $this->protocols;
    }

    /**
     * Recibe una colección de objetivos
     * que devuelve priorizados en función de los
     * protocolos de ataque contemplados en la estrategia.
     *
     * @param Target[] $targets
     *
     *      Colección de objetivos a priorizar.
     *
     * @return Target[]
     *
     *      Misma colección de objetivos ya priorizados.
     */
    public function prioritizeTargets(array $targets): array
    {
        foreach ($this->protocols as $protocol) {
            if (!$protocol instanceof Protocol) {
                continue;
            }

            $targets = $protocol->prioritizeTargets($targets);
        }

        return $targets;
    }

    /**
     * Revisa si un protocolo
     * es compatible con los protocolos
     * ya existentes en la estrategia de ataque.
     */
    public function isCompatible(Protocol $protocol): ?IncompatibleProtocols
    {
        foreach ($this->protocols as $currentProtocol) {
            if (!$currentProtocol instanceof Protocol) {
                continue;
            }

            if (in_array(get_class($protocol), $currentProtocol->getIncompatibleProtocols())) {
                return new IncompatibleProtocols($currentProtocol, $protocol);
            }
        }

        return null;
    }
}
