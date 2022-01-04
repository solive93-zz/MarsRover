<?php

namespace MarsRover\Tests;

use MarsRover\Tests\Shared\RoverBuilder;
use MarsRover\ValueObject\Direction;
use PHPUnit\Framework\TestCase;

final class MarsRoverTest extends TestCase
{
    public function test_mars_rover_is_instantiated_with_given_position_direction_and_planetMap()
    {
        $rover = RoverBuilder::createRoverBuilder()
            ->inPosition(1, 2)
            ->facing(Direction::WEST)
            ->inAPlanetWithSize(10, 10)
            ->instantiate();

        $this->assertEquals(1, $rover->latitude());
        $this->assertEquals(2, $rover->longitude());
        $this->assertEquals('W', $rover->direction());
    }

    public function test_mars_rover_should_move_forward_to_north_when_F_command_given()
    {
        $rover = RoverBuilder::createRoverBuilder()
            ->inPosition(0, 0)
            ->facing(Direction::NORTH)
            ->inAPlanetWithSize(10, 10)
            ->instantiate();

        $rover->move('FFF');

        $this->assertEquals(3, $rover->latitude());
        $this->assertEquals(0, $rover->longitude());
        $this->assertEquals('N', $rover->direction());
    }

    public function test_mars_rover_should_move_forward_to_east_when_F_command_given()
    {
        $rover = RoverBuilder::createRoverBuilder()
            ->inPosition(0, 0)
            ->facing(Direction::EAST)
            ->inAPlanetWithSize(10, 10)
            ->instantiate();

        $rover->move('FF');

        $this->assertEquals(0, $rover->latitude());
        $this->assertEquals(2, $rover->longitude());
        $this->assertEquals('E', $rover->direction());
    }

    public function test_mars_rover_should_move_forward_to_south_when_F_command_given()
    {
        $rover = RoverBuilder::createRoverBuilder()
            ->inPosition(5, 0)
            ->facing(Direction::SOUTH)
            ->inAPlanetWithSize(10, 10)
            ->instantiate();

        $rover->move('FFFF');

        $this->assertEquals(1, $rover->latitude());
        $this->assertEquals(0, $rover->longitude());
        $this->assertEquals('S', $rover->direction());
    }

    public function test_mars_rover_should_move_forward_to_west_when_F_command_given()
    {
        $rover = RoverBuilder::createRoverBuilder()
            ->inPosition(2, 4)
            ->facing(Direction::WEST)
            ->inAPlanetWithSize(10, 10)
            ->instantiate();

        $rover->move('FF');

        $this->assertEquals(2, $rover->latitude());
        $this->assertEquals(2, $rover->longitude());
        $this->assertEquals('W', $rover->direction());
    }

    public function test_mars_rover_should_turn_right_when_R_command_is_given()
    {
        $rover = RoverBuilder::createRoverBuilder()
            ->inPosition(1, 1)
            ->facing(Direction::NORTH)
            ->inAPlanetWithSize(10, 10)
            ->instantiate();

        $rover->move('RRRRR');

        $this->assertEquals(1, $rover->latitude());
        $this->assertEquals(1, $rover->longitude());
        $this->assertEquals('E', $rover->direction());
    }

    public function test_mars_rover_should_turn_left_when_L_command_is_given()
    {
        $rover = RoverBuilder::createRoverBuilder()
            ->inPosition(1, 1)
            ->facing(Direction::EAST)
            ->inAPlanetWithSize(10, 10)
            ->instantiate();

        $rover->move('LLLLL');

        $this->assertEquals(1, $rover->latitude());
        $this->assertEquals(1, $rover->longitude());
        $this->assertEquals('N', $rover->direction());
    }
}