<?php

namespace MarsRover\Tests;

use MarsRover\Exception\InvalidDirectionException;
use MarsRover\ValueObject\Direction;
use PHPUnit\Framework\TestCase;

class DirectionTest extends TestCase
{
    public function test_direction_is_north_when_by_default()
    {
        $direction = new Direction();

        $this->assertEquals(Direction::NORTH, $direction->value());
    }

    public function test_direction_should_throw_and_exception_when_invalid_direction_given()
    {
        $this->expectException(InvalidDirectionException::class);
        $this->expectExceptionMessage(InvalidDirectionException::ERROR_MESSAGE);

        new Direction('I');
    }
}
