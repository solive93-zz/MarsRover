<?php

namespace MarsRover\Exception;

use Exception;

class InvalidDirectionException EXTENDS Exception
{
    public const ERROR_MESSAGE = 'Given Direction is invalid. Valid directions: N, E, S, W';

    public function __construct(?string $message = null)
    {
        parent::__construct($message ?? self::ERROR_MESSAGE);
    }
}