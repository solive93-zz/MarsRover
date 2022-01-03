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

    public function test_mars_rover_should_move_forward_when_F_command_given()
    {
        $rover = new MarsRover(new Position(0, 0), 'N');

        $rover->move('FFF');

        $this->assertEquals(3, $rover->latitude());
        $this->assertEquals(0, $rover->longitude());
        $this->assertEquals('N', $rover->direction());
    }

    public function test_mars_rover_should_turn_right_when_R_command_is_given()
    {
        $rover = new MarsRover(new Position(1, 1), 'N');

        $rover->move('RRRRR');

        $this->assertEquals(1, $rover->latitude());
        $this->assertEquals(1, $rover->longitude());
        $this->assertEquals('O', $rover->direction());
    }
}