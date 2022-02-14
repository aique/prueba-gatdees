<?php

namespace App\Battlefield;

use App\Entity\Battlefield\Battlefield;
use App\Entity\Battlefield\Coordinates;
use App\Entity\Battlefield\Enemy;
use App\Entity\Battlefield\Target;

class BattlefieldSerializer
{
    public function deserialize(array $data): Battlefield
    {
        $battlefield = new Battlefield();

        foreach ($data['scan'] as $targetData) {
            $battlefield->addTarget($this->deserializeTarget($targetData));
        }

        return $battlefield;
    }

    private function deserializeTarget(array $data): Target
    {
        $coordinates = $this->deserializeCoordinates($data['coordinates']);
        $enemy = $this->deserializeEnemy($data['enemies']);
        $allies = $data['allies'] ?? 0;

        return new Target($coordinates, $enemy, $allies);
    }

    private function deserializeCoordinates(array $data): Coordinates
    {
        return new Coordinates($data['x'], $data['y']);
    }

    private function deserializeEnemy(array $data): Enemy
    {
        return new Enemy($data['type'], $data['number']);
    }
}
