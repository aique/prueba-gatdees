<?php

namespace App\Tests\integration;

use App\Battlefield\BattlefieldMapper;
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
        $data = [
            'scan' => [
                'coordinates' => [
                    'x' => 0,
                    'y' => 40,
                ],
            ],
        ];

        try {
            $battlefield = $this->mapper->map($data);
        } catch (InvalidBattlefieldInputDataException $ex) {
            $this->fail('InvalidBattlefieldInputDataException should not be thrown');
        }

        $this->assertTrue($battlefield->hasTargets());
    }
}
