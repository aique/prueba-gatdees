<?php

namespace App\Tests\integration;

use App\AttackStrategy\ProtocolFactory;
use App\Entity\Enemy;

class InputDataGenerator
{
    public static function validData(): array
    {
        return [
            'protocols' => [
                ProtocolFactory::CLOSEST_ENEMIES_PROTOCOL
            ],
            'scan' => [
                [
                    'coordinates' => [
                        'x' => '0',
                        'y' => '40',
                    ],
                    'enemies' => [
                        'number' => 10,
                        'type' => Enemy::SOLDIER_TYPE
                    ],
                    'allies' => 5,
                ],
            ],
        ];
    }

    public static function multipleProtocolsData(): array
    {
        return [
            'protocols' => [
                ProtocolFactory::CLOSEST_ENEMIES_PROTOCOL,
                ProtocolFactory::AVOID_MECH_PROTOCOL,
            ],
            'scan' => [
                [
                    'coordinates' => [
                        'x' => '0',
                        'y' => '40',
                    ],
                    'enemies' => [
                        'number' => 10,
                        'type' => Enemy::SOLDIER_TYPE
                    ],
                    'allies' => 5,
                ],
            ],
        ];
    }

    public static function emptyAlliesData(): array
    {
        return [
            'protocols' => [
                ProtocolFactory::CLOSEST_ENEMIES_PROTOCOL
            ],
            'scan' => [
                [
                    'coordinates' => [
                        'x' => '0',
                        'y' => '40',
                    ],
                    'enemies' => [
                        'number' => 10,
                        'type' => Enemy::SOLDIER_TYPE
                    ],
                ],
            ],
        ];
    }
}
