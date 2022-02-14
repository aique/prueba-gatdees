<?php

namespace App\Tests\integration;

use App\AttackStrategy\AttackStrategySerializer;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AttackStrategyDeserializationTest extends KernelTestCase
{
    private AttackStrategySerializer $serializer;

    protected function setUp(): void
    {
        self::bootKernel();

        $this->serializer = static::getContainer()->get(AttackStrategySerializer::class);
    }

    public function testValidInput(): void
    {
        $attackStrategy = $this->serializer->deserialize(InputDataGenerator::validData()['protocols']);
        $this->assertCount(1, $attackStrategy->getProtocols());

        $attackStrategy = $this->serializer->deserialize(InputDataGenerator::multipleProtocolsData()['protocols']);
        $this->assertCount(2, $attackStrategy->getProtocols());
    }
}
