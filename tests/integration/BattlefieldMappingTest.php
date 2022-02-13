<?php

namespace App\Tests\integration;

use App\Battlefield\BattlefieldMapper;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BattlefieldMappingTest extends KernelTestCase
{
    private BattlefieldMapper $mapper;

    protected function setUp(): void
    {
        self::bootKernel();

        $this->mapper = static::getContainer()->get(BattlefieldMapper::class);
    }

    public function testValidInput(): void {
        $data = [
            "coordinates" => [
                ["x" => 10, "y" => 10],
            ],
        ];

        $battlefield = $this->mapper->map($data);

        $this->assertTrue($battlefield->hasTargets());
    }
}