<?php

namespace App\Error;

class InvalidBattlefieldInputDataException extends \Exception
{
    private const MESSAGE = 'Invalid input data';

    public function __construct()
    {
        parent::__construct(self::MESSAGE);
    }
}
