<?php

namespace App\Tests\integration;

use App\Entity\Battlefield\AttackStrategy;
use App\Entity\Battlefield\Battlefield;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PrioritizeTargetsTest extends KernelTestCase
{
    public function testEmptyBattlefield(): void {
        $battlefield = new Battlefield();
        $attackStrategy = new AttackStrategy();

        $battlefield->prioritizeTargets($attackStrategy);

        $this->assertEmpty($battlefield->getTargets());
        $this->assertNull($battlefield->nextTarget());
    }
}