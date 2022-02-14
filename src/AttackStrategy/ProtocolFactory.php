<?php

namespace App\AttackStrategy;

use App\AttackStrategy\Protocol\Protocol;

class ProtocolFactory
{
    public const CLOSEST_ENEMIES_PROTOCOL = 'closest-enemies';
    public const FURTHEST_ENEMIES_PROTOCOL = 'furthest-enemies';
    public const ASSIST_ALLIES_PROTOCOL = 'assist-allies';
    public const AVOID_CROSSFIRE_PROTOCOL = 'avoid-crossfire';
    public const PRIORITIZE_MECH_PROTOCOL = 'prioritize-mech';
    public const AVOID_MECH_PROTOCOL = 'avoid-mech';

    /**
     * @var Protocol[]
     */
    private array $protocols;

    public function __construct(array $protocols)
    {
        $this->protocols = $protocols;
    }

    public function create(string $name): ?Protocol
    {
        foreach ($this->protocols as $protocolName => $protocolValue) {
            if ($protocolName == $name) {
                return $protocolValue;
            }
        }

        return null;
    }
}
