<?php

namespace App\Tests\integration;

use App\Battlefield\BattlefieldMapper;
use App\Error\InvalidBattlefieldInputDataException;
use App\Tests\src\InputDataGenerator;
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
            $battlefield = $this->mapper->map(InputDataGenerator::validData());
        } catch (InvalidBattlefieldInputDataException $ex) {
            $this->fail('InvalidBattlefieldInputDataException should not be thrown');
        }

        $this->assertTrue($battlefield->hasTargets());
        $this->assertEquals(10, ($battlefield->getTargets()[0])->getEnemy()->getNumber());
        $this->assertEquals(5, ($battlefield->getTargets()[0])->getAllies());

        try {
            $battlefield = $this->mapper->map(InputDataGenerator::emptyAlliesData());
        } catch (InvalidBattlefieldInputDataException $ex) {
            $this->fail('InvalidBattlefieldInputDataException should not be thrown');
        }

        $this->assertTrue($battlefield->hasTargets());
        $this->assertEquals(10, ($battlefield->getTargets()[0])->getEnemy()->getNumber());
        $this->assertEquals(0, ($battlefield->getTargets()[0])->getAllies());
    }
}
