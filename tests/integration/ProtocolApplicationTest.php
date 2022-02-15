<?php

namespace App\Tests\integration;

use App\Battlefield\AttackStrategy\ProtocolFactory;
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
        $protocols = [
            ProtocolFactory::CLOSEST_ENEMIES_PROTOCOL,
        ];

        $battlefield = $this->mapper->map(InputDataGenerator::setteableProtocolData($protocols));

        $this->assertEquals(0, $battlefield->nextTarget()->getCoordinates()->getX());
        $this->assertEquals(40, $battlefield->nextTarget()->getCoordinates()->getY());

        $protocols = [
            ProtocolFactory::FURTHEST_ENEMIES_PROTOCOL,
        ];

        $battlefield = $this->mapper->map(InputDataGenerator::setteableProtocolData($protocols));

        $this->assertEquals(50, $battlefield->nextTarget()->getCoordinates()->getX());
        $this->assertEquals(70, $battlefield->nextTarget()->getCoordinates()->getY());
    }
}