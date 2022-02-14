<?php

namespace App\Tests\unit;

use App\AttackStrategy\ProtocolFactory;
use App\Battlefield\BattlefieldValidator;
use App\Entity\Enemy;
use App\Tests\src\InputDataGenerator;
use PHPUnit\Framework\TestCase;

class BattlefieldValidatorTest extends TestCase
{
    public function testInvalidScan(): void
    {
        $battlefieldValidator = new BattlefieldValidator();

        $this->assertFalse($battlefieldValidator->isValid([]));
        $this->assertFalse($battlefieldValidator->isValid(InputDataGenerator::emptyScanData()));
        $this->assertFalse($battlefieldValidator->isValid(InputDataGenerator::emptyEnemiesData()));
        $this->assertFalse($battlefieldValidator->isValid(InputDataGenerator::negativeEnemiesNumberData()));
        $this->assertFalse($battlefieldValidator->isValid(InputDataGenerator::emptyProtocolsData()));
    }

    public function testValidScan(): void
    {
        $battlefieldValidator = new BattlefieldValidator();

        $data = [
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

        $this->assertTrue($battlefieldValidator->isValid($data));

        $data = [
            'protocols' => [
                ProtocolFactory::PRIORITIZE_MECH_PROTOCOL,
                ProtocolFactory::AVOID_CROSSFIRE_PROTOCOL,
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
                [
                    'coordinates' => [
                        'x' => '50',
                        'y' => '60',
                    ],
                    'enemies' => [
                        'number' => 1,
                        'type' => Enemy::MECH_TYPE
                    ],
                ],
            ],
        ];

        $this->assertTrue($battlefieldValidator->isValid($data));
    }
}
