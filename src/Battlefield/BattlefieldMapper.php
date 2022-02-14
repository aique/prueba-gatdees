<?php

namespace App\Battlefield;

use App\Entity\Battlefield\Battlefield;
use App\Error\InvalidBattlefieldInputDataException;

class BattlefieldMapper
{
    private BattlefieldSerializer $serializer;
    private BattlefieldValidator $validator;

    public function __construct(
        BattlefieldSerializer $serializer,
        BattlefieldValidator $validator
    ) {
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    public function map(array $data): Battlefield
    {
        if (!$this->validator->isValid($data)) {
            throw new InvalidBattlefieldInputDataException();
        }

        return $this->serializer->deserialize($data);
    }
}
