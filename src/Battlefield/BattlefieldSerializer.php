<?php

namespace App\Battlefield;

use App\Entity\Battlefield\Battlefield;

class BattlefieldSerializer
{
    public function deserialize(array $data): Battlefield
    {
        return new Battlefield();
    }
}
