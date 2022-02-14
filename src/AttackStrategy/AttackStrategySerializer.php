<?php

namespace App\AttackStrategy;

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
                if (!$attackStrategy->isCompatible($protocol)) {
                    throw new IncompatibleProtocolException($protocol);
                }

                $attackStrategy->addProtocol($protocol);
            }
        }

        return $attackStrategy;
    }
}
