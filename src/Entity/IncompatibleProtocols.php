<?php

namespace App\Entity;

use App\Battlefield\AttackStrategy\Protocol\Protocol;

/**
 * Representa dos protocolos incompatibles.
 */
class IncompatibleProtocols
{
    private Protocol $protocol1;
    private Protocol $protocol2;

    public function __construct(Protocol $protocol1, Protocol $protocol2)
    {
        $this->protocol1 = $protocol1;
        $this->protocol2 = $protocol2;
    }

    public function getProtocol1(): Protocol
    {
        return $this->protocol1;
    }

    public function getProtocol2(): Protocol
    {
        return $this->protocol2;
    }
}
