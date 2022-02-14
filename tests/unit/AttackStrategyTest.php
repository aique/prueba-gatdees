<?php

namespace App\Tests\unit;

use App\Entity\Battlefield\AttackStrategy;
use PHPUnit\Framework\TestCase;

class AttackStrategyTest extends TestCase
{
    public function testEmptyTargets(): void
    {
        $attackStrategy = new AttackStrategy();

        $this->assertEmpty($attackStrategy->prioritizeTargets([]));
    }
}
