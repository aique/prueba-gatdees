<?php

namespace App\Battlefield\Serialization;

use App\Battlefield\AttackStrategy\ProtocolFactory;
use App\Entity\AttackStrategy;
use App\Error\IncompatibleProtocolException;

class AttackStrategySerializer
{
    private ProtocolFactory $protocolFactory;

    public function __construct(ProtocolFactory $protocolFactory)
    {
        $this->protocolFactory = $protocolFactory;
    }

    public function deserialize(array $data): AttackStrategy
    {
        $attackStrategy = new AttackStrategy();

        foreach ($data as $protocolName) {
            $protocol = $this->protocolFactory->create($protocolName);

            if (!empty($protocol)) {
                $incompatibleProtocols = $attackStrategy->isCompatible($protocol);

                if (!empty($incompatibleProtocols)) {
                    throw new IncompatibleProtocolException($incompatibleProtocols);
                }

                $attackStrategy->addProtocol($protocol);
            }
        }

        return $attackStrategy;
    }
}
