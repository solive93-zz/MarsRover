<?php

namespace MarsRover\Tests\Shared;

use MarsRover\MarsRover;
use MarsRover\ValueObject\Direction;
use MarsRover\ValueObject\PlanetMap;
use MarsRover\ValueObject\Position;

final class RoverBuilder
{
    private Position  $position;
    private Direction $direction;
    private int       $maxHeight;
    private int       $maxWidth;
    private ?array    $obstacle;

    public static function createRoverBuilder(): self
    {
        return new self();
    }

    public function inPosition(int $latitude, int $longitude): self
    {
        $this->position = new Position($latitude, $longitude);
        return $this;
    }

    public function facing(string $direction): self
    {
        $this->direction = new Direction($direction);
        return $this;
    }

    public function inAPlanetWithSize(int $maxHeight, int $maxWidth): self
    {
        $this->maxHeight = $maxHeight;
        $this->maxWidth = $maxWidth;
        return $this;
    }

    public function thatHasAnObstacleOn(int $latitude, int $longitude): self
    {
        $this->obstacle = [new Position($latitude, $longitude)];
        return $this;
    }

    public function instantiate(): MarsRover
    {
        $obstacle = $this->obstacle ?? [];
        $map = new PlanetMap($this->maxHeight, $this->maxWidth, $obstacle);
        return new MarsRover($map, $this->position, $this->direction);
    }
}