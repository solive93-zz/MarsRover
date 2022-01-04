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

    public function test_mars_rover_should_appear_to_south_when_being_on_north_edge_facing_north_and_F_command_given()
    {
        $rover = RoverBuilder::createRoverBuilder()
            ->inPosition(4, 0)
            ->facing(Direction::NORTH)
            ->inAPlanetWithSize(5, 5)
            ->instantiate();

        $rover->move('F');

        $this->assertEquals(0, $rover->latitude());
        $this->assertEquals(0, $rover->longitude());
        $this->assertEquals('N', $rover->direction());
    }

    public function test_mars_rover_should_appear_to_north_when_being_on_south_edge_facing_south_and_F_command_given()
    {
        $rover = RoverBuilder::createRoverBuilder()
            ->inPosition(0, 0)
            ->facing(Direction::SOUTH)
            ->inAPlanetWithSize(5, 5)
            ->instantiate();

        $rover->move('F');

        $this->assertEquals(4, $rover->latitude());
        $this->assertEquals(0, $rover->longitude());
        $this->assertEquals(Direction::SOUTH, $rover->direction());
    }

    public function test_mars_rover_should_appear_to_west_when_being_on_east_edge_facing_east_and_F_command_given()
    {
        $rover = RoverBuilder::createRoverBuilder()
            ->inPosition(0, 4)
            ->facing(Direction::EAST)
            ->inAPlanetWithSize(5, 5)
            ->instantiate();

        $rover->move('F');

        $this->assertEquals(0, $rover->latitude());
        $this->assertEquals(0, $rover->longitude());
        $this->assertEquals(Direction::EAST, $rover->direction());
    }

    public function test_mars_rover_should_appear_to_east_when_being_on_west_edge_facing_west_and_F_command_given()
    {
        $rover = RoverBuilder::createRoverBuilder()
            ->inPosition(0, 0)
            ->facing(Direction::WEST)
            ->inAPlanetWithSize(5, 5)
            ->instantiate();

        $rover->move('F');

        $this->assertEquals(0, $rover->latitude());
        $this->assertEquals(4, $rover->longitude());
        $this->assertEquals(Direction::WEST, $rover->direction());
    }
}