<?php

namespace App\Battlefield;

use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Optional;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class BattlefieldValidator
{
    private ValidatorInterface $validator;

    public function __construct()
    {
        $this->validator = Validation::createValidator();
    }

    public function isValid(array $data): bool
    {
        $constraints = new Collection([
            'protocols' => $this->getProtocolsConstraints(),
            'scan' => $this->getScanConstraints(),
        ]);

        $violations = $this->validator->validate($data, $constraints);

        return empty($violations->count());
    }

    private function getProtocolsConstraints(): array
    {
        return [
            new Type('array'),
            new NotBlank(),
            new All([
                new Type('string'),
            ]),
        ];
    }

    private function getScanConstraints(): array
    {
        return [
            new Type('array'),
            new NotBlank(),
            new All([
                new Collection([
                    'coordinates' => $this->getCoordinatesConstraints(),
                    'enemies' => $this->getEnemiesConstraints(),
                    'allies' => $this->getAlliesConstraints(),
                ]),
            ]),
        ];
    }

    private function getCoordinatesConstraints(): array
    {
        return [
            new Collection([
                'x' => [
                    new Type('int')
                ],
                'y' => [
                    new Type('int')
                ],
            ])
        ];
    }

    private function getEnemiesConstraints(): array
    {
        return [
            new Collection([
                'number' => [
                    new Positive(),
                ],
                'type' => [
                    new Type('string'),
                    new NotBlank(),
                ],
            ]),
        ];
    }

    private function getAlliesConstraints(): array
    {
        return [
            new Optional([
                new Positive(),
            ]),
        ];
    }
}
