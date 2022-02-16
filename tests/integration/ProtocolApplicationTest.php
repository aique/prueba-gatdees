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

    public function testEnemyDistanceProtocols(): void
    {
        $protocols = [
            ProtocolFactory::CLOSEST_ENEMIES_PROTOCOL,
        ];

        $battlefield = $this->mapper->map(InputDataGenerator::setteableProtocolData($protocols));
        $nextTarget = $battlefield->nextTarget();

        $this->assertEquals(0, $nextTarget->getCoordinates()->getX());
        $this->assertEquals(40, $nextTarget->getCoordinates()->getY());

        $protocols = [
            ProtocolFactory::FURTHEST_ENEMIES_PROTOCOL,
        ];

        $battlefield = $this->mapper->map(InputDataGenerator::setteableProtocolData($protocols));
        $nextTarget = $battlefield->nextTarget();

        $this->assertEquals(50, $nextTarget->getCoordinates()->getX());
        $this->assertEquals(70, $nextTarget->getCoordinates()->getY());
    }

    public function testEnemyTypeProtocols(): void
    {
        $protocols = [
            ProtocolFactory::PRIORITIZE_MECH_PROTOCOL,
        ];

        $battlefield = $this->mapper->map(InputDataGenerator::setteableProtocolData($protocols));
        $nextTarget = $battlefield->nextTarget();

        $this->assertEquals(50, $nextTarget->getCoordinates()->getX());
        $this->assertEquals(70, $nextTarget->getCoordinates()->getY());

        $protocols = [
            ProtocolFactory::AVOID_MECH_PROTOCOL,
        ];

        $battlefield = $this->mapper->map(InputDataGenerator::setteableProtocolData($protocols));
        $nextTarget = $battlefield->nextTarget();

        $this->assertEquals(20, $nextTarget->getCoordinates()->getX());
        $this->assertEquals(50, $nextTarget->getCoordinates()->getY());
    }

    public function testAlliesTypeProtocols(): void
    {
        $protocols = [
            ProtocolFactory::ASSIST_ALLIES_PROTOCOL,
        ];

        $battlefield = $this->mapper->map(InputDataGenerator::setteableProtocolData($protocols));
        $nextTarget = $battlefield->nextTarget();

        $this->assertEquals(50, $nextTarget->getCoordinates()->getX());
        $this->assertEquals(70, $nextTarget->getCoordinates()->getY());

        $protocols = [
            ProtocolFactory::AVOID_CROSSFIRE_PROTOCOL,
        ];

        $battlefield = $this->mapper->map(InputDataGenerator::setteableProtocolData($protocols));
        $nextTarget = $battlefield->nextTarget();

        $this->assertEquals(20, $nextTarget->getCoordinates()->getX());
        $this->assertEquals(50, $nextTarget->getCoordinates()->getY());
    }
}
