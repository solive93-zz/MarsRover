<?php

use MarsRover\MarsRover;
use MarsRover\ValueObject\Position;
use PHPUnit\Framework\TestCase;

final class MarsRoverTest extends TestCase
{
    public function test_mars_rover_is_instantiated_with_given_position_and_direction()
    {
        $rover = new MarsRover(new Position(1, 2), 'W');

        $this->assertEquals(1, $rover->latitude());
        $this->assertEquals(2, $rover->longitude());
        $this->assertEquals('W', $rover->direction());
    }
}