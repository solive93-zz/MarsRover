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

    public function test_mars_rover_should_move_forward_when_F_command_passed()
    {
        $rover = new MarsRover(new Position(0, 0), 'N');

        $rover->move('FFF');

        $this->assertEquals(3, $rover->latitude());
        $this->assertEquals(0, $rover->longitude());
        $this->assertEquals('N', $rover->direction());
    }
}