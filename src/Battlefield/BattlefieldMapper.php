<?php

namespace App\Battlefield;

use App\Entity\Battlefield\Battlefield;

class BattlefieldMapper
{
    public function map(array $data): Battlefield {
        return new Battlefield();
    }
}