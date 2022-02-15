<?php

namespace App\Battlefield\Serialization;

use App\Entity\Coordinates;
use App\Entity\Enemy;
use App\Entity\Target;

class TargetSerializer
{
    public function deserialize(array $data): Target
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
