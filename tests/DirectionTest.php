<?php

use MarsRover\Exception\InvalidDirectionException;
use MarsRover\ValueObject\Direction;
use PHPUnit\Framework\TestCase;

class DirectionTest extends TestCase
{
    public function test_direction_should_throw_and_exception_when_invalid_direction_given()
    {
        $this->expectException(InvalidDirectionException::class);
        $this->expectExceptionMessage(InvalidDirectionException::ERROR_MESSAGE);

        new Direction('I');
    }
}
