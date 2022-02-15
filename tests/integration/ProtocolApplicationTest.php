<?php

namespace App\Tests\integration;

use App\Battlefield\BattlefieldMapper;
use App\Tests\src\InputDataGenerator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProtocolApplicationTest extends KernelTestCase
{
    private BattlefieldMapper $mapper;

    protected function setUp(): void
    {
        self::bootKernel();

        $this->mapper = static::getContainer()->get(BattlefieldMapper::class);
    }

    public function testClosestEnemiesProtocol(): void
    {
        $battlefield = $this->mapper->map(InputDataGenerator::closestEnemiesProtocolData());

        $this->assertEquals(0, $battlefield->nextTarget()->getCoordinates()->getX());
        $this->assertEquals(40, $battlefield->nextTarget()->getCoordinates()->getY());
    }
}