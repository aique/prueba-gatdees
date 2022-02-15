<?php

namespace App\Error;

use App\Entity\IncompatibleProtocols;

class IncompatibleProtocolException extends \Exception
{
    private const MESSAGE = 'Incompatible protocols between %s and %s';

    public function __construct(IncompatibleProtocols $incompatibleProtocols)
    {
        $protocol1Class = get_class($incompatibleProtocols->getProtocol1());
        $protocol2Class = get_class($incompatibleProtocols->getProtocol2());

        parent::__construct(sprintf(self::MESSAGE, $protocol1Class, $protocol2Class));
    }
}
