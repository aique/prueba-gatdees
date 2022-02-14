<?php

namespace App\Error;

use App\AttackStrategy\Protocol\Protocol;

class IncompatibleProtocolException extends \Exception
{
    private const MESSAGE = 'Incompatible protocol: %s';

    private Protocol $protocol;

    public function __construct(Protocol $protocol)
    {
        $this->protocol = $protocol;

        parent::__construct(sprintf(self::MESSAGE, get_class($protocol)));
    }
}
