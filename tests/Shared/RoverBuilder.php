<?php

namespace MarsRover\Tests\Shared;

use MarsRover\MarsRover;
use MarsRover\ValueObject\Direction;
use MarsRover\ValueObject\PlanetMap;
use MarsRover\ValueObject\Position;

final class RoverBuilder
{
    private PlanetMap $map;
    private Position $position;
    private Direction $direction;

    public function __construct()
    {
    }

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
        $this->map = new PlanetMap($maxHeight, $maxWidth);
        return $this;
    }

    public function instantiate(): MarsRover
    {
        return new MarsRover($this->map, $this->position, $this->direction);
    }
}