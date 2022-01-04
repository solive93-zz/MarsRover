<?php

use MarsRover\MarsRover;
use MarsRover\ValueObject\Direction;
use MarsRover\ValueObject\Position;
use PHPUnit\Framework\TestCase;

final class MarsRoverTest extends TestCase
{
    public function test_mars_rover_is_instantiated_with_given_position_and_direction()
    {
        $rover = new MarsRover(new Position(1, 2), new Direction ('W'));

        $this->assertEquals(1, $rover->latitude());
        $this->assertEquals(2, $rover->longitude());
        $this->assertEquals('W', $rover->direction());
    }

    public function test_mars_rover_should_move_forward_to_north_when_F_command_given()
    {
        $rover = new MarsRover(new Position(0, 0), new Direction('N'));

        $rover->move('FFF');

        $this->assertEquals(3, $rover->latitude());
        $this->assertEquals(0, $rover->longitude());
        $this->assertEquals('N', $rover->direction());
    }

    public function test_mars_rover_should_move_forward_to_east_when_F_command_given()
    {
        $rover = new MarsRover(new Position(0, 0), new Direction('E'));

        $rover->move('FF');

        $this->assertEquals(0, $rover->latitude());
        $this->assertEquals(2, $rover->longitude());
        $this->assertEquals('E', $rover->direction());
    }

    public function test_mars_rover_should_move_forward_to_south_when_F_command_given()
    {
        $rover = new MarsRover(new Position(5, 0), new Direction('S'));

        $rover->move('FFFF');

        $this->assertEquals(1, $rover->latitude());
        $this->assertEquals(0, $rover->longitude());
        $this->assertEquals('S', $rover->direction());
    }

    public function test_mars_rover_should_move_forward_to_west_when_F_command_given()
    {
        $rover = new MarsRover(new Position(2, 4), new Direction('W'));

        $rover->move('FF');

        $this->assertEquals(2, $rover->latitude());
        $this->assertEquals(2, $rover->longitude());
        $this->assertEquals('W', $rover->direction());
    }

    public function test_mars_rover_should_turn_right_when_R_command_is_given()
    {
        $rover = new MarsRover(new Position(1, 1), new Direction('N'));

        $rover->move('RRRRR');

        $this->assertEquals(1, $rover->latitude());
        $this->assertEquals(1, $rover->longitude());
        $this->assertEquals('E', $rover->direction());
    }

    public function test_mars_rover_should_turn_left_when_L_command_is_given()
    {
        $rover = new MarsRover(new Position(1, 1), new Direction('E'));

        $rover->move('LLLLL');

        $this->assertEquals(1, $rover->latitude());
        $this->assertEquals(1, $rover->longitude());
        $this->assertEquals('N', $rover->direction());
    }
}