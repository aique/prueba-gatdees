<?php

namespace App\Battlefield;

use App\Battlefield\Serialization\AttackStrategySerializer;
use App\Battlefield\Serialization\TargetSerializer;
use App\Entity\Battlefield;
use App\Error\InvalidBattlefieldInputDataException;

/**
 * Crea la situación del campo de batalla
 * en función de su descripción. Es utilizado para
 * la serialización de los datos de entrada del endpoint principal.
 */
class BattlefieldMapper
{
    private BattlefieldValidator $validator;
    private TargetSerializer $targetSerializer;
    private AttackStrategySerializer $attackStrategySerializer;

    public function __construct(
        BattlefieldValidator $validator,
        TargetSerializer $targetSerializer,
        AttackStrategySerializer $attackStrategySerializer
    ) {
        $this->validator = $validator;
        $this->targetSerializer = $targetSerializer;
        $this->attackStrategySerializer = $attackStrategySerializer;
    }

    public function map(array $data): Battlefield
    {
        if (!$this->validator->isValid($data)) {
            throw new InvalidBattlefieldInputDataException();
        }

        $attackStrategy = $this->attackStrategySerializer->deserialize($data['protocols']);

        $battlefield = new Battlefield($attackStrategy);

        foreach ($data['scan'] as $targetData) {
            $battlefield->addTarget(
                $this->targetSerializer->deserialize($targetData)
            );
        }

        return $battlefield;
    }
}
