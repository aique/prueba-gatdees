<?php

namespace App\Tests\src;

use App\Battlefield\AttackStrategy\ProtocolFactory;
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
                        'x' => 0,
                        'y' => 40,
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
                        'x' => 0,
                        'y' => 40,
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

    public static function setteableProtocolData(array $protocols): array
    {
        return [
            'protocols' => $protocols,
            'scan' => [
                [
                    'coordinates' => [
                        'x' => 50,
                        'y' => 70,
                    ],
                    'enemies' => [
                        'number' => 6,
                        'type' => Enemy::MECH_TYPE
                    ],
                    'allies' => 2,
                ],
                [
                    'coordinates' => [
                        'x' => 0,
                        'y' => 40,
                    ],
                    'enemies' => [
                        'number' => 10,
                        'type' => Enemy::MECH_TYPE
                    ],
                    'allies' => 5,
                ],
                [
                    'coordinates' => [
                        'x' => 20,
                        'y' => 50,
                    ],
                    'enemies' => [
                        'number' => 4,
                        'type' => Enemy::SOLDIER_TYPE
                    ],
                ],
            ],
        ];
    }

    public static function incompatibleProtocolsData(): array
    {
        return [
            'protocols' => [
                ProtocolFactory::PRIORITIZE_MECH_PROTOCOL,
                ProtocolFactory::AVOID_MECH_PROTOCOL,
            ],
            'scan' => [
                [
                    'coordinates' => [
                        'x' => 0,
                        'y' => 40,
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
                        'x' => 0,
                        'y' => 40,
                    ],
                    'enemies' => [
                        'number' => 10,
                        'type' => Enemy::SOLDIER_TYPE
                    ],
                ],
            ],
        ];
    }

    public static function emptyScanData(): array
    {
        return [
            'scan' => [],
        ];
    }

    public static function emptyEnemiesData(): array
    {
        return [
            'scan' => [
                [
                    'coordinates' => [
                        'x' => 0,
                        'y' => 40,
                    ],
                ],
            ],
        ];
    }

    public static function negativeEnemiesNumberData(): array
    {
        return [
            'scan' => [
                [
                    'coordinates' => [
                        'x' => 0,
                        'y' => 40,
                    ],
                    'enemies' => [
                        'number' => -10,
                    ],
                ],
            ],
        ];
    }

    public static function emptyProtocolsData(): array
    {
        return [
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
                    'allies' => 5
                ],
            ],
        ];
    }
}
