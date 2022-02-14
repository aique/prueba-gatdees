<?php

namespace App\Error;

class InvalidBattlefieldInputDataException extends \Exception
{
    private const MESSAGE = 'Invalid input data';

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct(self::MESSAGE, $code, $previous);
    }
}
