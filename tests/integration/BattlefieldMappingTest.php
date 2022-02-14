<?php

namespace App\Tests\integration;

use App\Battlefield\BattlefieldMapper;
use App\Entity\Battlefield\Enemy;
use App\Entity\Protocol\ProtocolFactory;
use App\Error\InvalidBattlefieldInputDataException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BattlefieldMappingTest extends KernelTestCase
{
    private BattlefieldMapper $mapper;

    protected function setUp(): void
    {
        self::bootKernel();

        $this->mapper = static::getContainer()->get(BattlefieldMapper::class);
    }

    public function testValidInput(): void
    {
        try {
            $battlefield = $this->mapper->map($this->validData());
        } catch (InvalidBattlefieldInputDataException $ex) {
            $this->fail('InvalidBattlefieldInputDataException should not be thrown');
        }

        $this->assertTrue($battlefield->hasTargets());
        $this->assertEquals(10, ($battlefield->getTargets()[0])->getEnemy()->getNumber());
        $this->assertEquals(5, ($battlefield->getTargets()[0])->getAllies());

        try {
            $battlefield = $this->mapper->map($this->emptyAlliesData());
        } catch (InvalidBattlefieldInputDataException $ex) {
            $this->fail('InvalidBattlefieldInputDataException should not be thrown');
        }

        $this->assertTrue($battlefield->hasTargets());
        $this->assertEquals(10, ($battlefield->getTargets()[0])->getEnemy()->getNumber());
        $this->assertEquals(0, ($battlefield->getTargets()[0])->getAllies());
    }

    private function validData(): array
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

    private function emptyAlliesData(): array
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
