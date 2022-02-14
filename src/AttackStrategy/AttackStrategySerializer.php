<?php

namespace App\AttackStrategy;

use App\Entity\AttackStrategy;

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
                $attackStrategy->addProtocol($protocol);
            }
        }

        return $attackStrategy;
    }
}
