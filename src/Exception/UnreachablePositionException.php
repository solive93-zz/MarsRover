<?php

namespace MarsRover\Exception;

use Exception;
use MarsRover\ValueObject\Position;

class UnreachablePositionException extends Exception
{
    public const ERROR_MESSAGE = 'An obstacle was encountered at position:';

    public function __construct(Position $position)
    {
        parent::__construct(
            sprintf(
                '%s (%u, %u).',
                self::ERROR_MESSAGE, $position->latitude(), $position->longitude()
            )
        );
    }
}