<?php

namespace App\Tests\unit;

use App\Entity\Coordinates;
use App\Entity\Enemy;
use App\Entity\Target;
use PHPUnit\Framework\TestCase;

class TargetTest extends TestCase
{
    public function testDistance(): void
    {
        $enemy = new Enemy(Enemy::SOLDIER_TYPE, 1);

        $origin = new Coordinates(0, 0);
        $coordinates1 = new Coordinates(50, 70);
        $coordinates2 = new Coordinates(0, 40);

        $target1 = new Target(
            $coordinates1, $enemy
        );

        $target2 = new Target(
            $coordinates2, $enemy
        );

        $this->assertTrue($target1->getDistance($origin) > $target2->getDistance($origin));
    }
}