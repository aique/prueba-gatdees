<?php

namespace App\Tests\integration;

use App\Entity\AttackStrategy;
use App\Entity\Battlefield;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PrioritizeTargetsTest extends KernelTestCase
{
    public function testEmptyBattlefield(): void
    {
        $battlefield = new Battlefield(
            new AttackStrategy()
        );

        $this->assertEmpty($battlefield->getTargets());
        $this->assertNull($battlefield->nextTarget());
    }
}
