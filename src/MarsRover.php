<?php

declare(strict_types=1);

namespace MarsRover;

use MarsRover\ValueObject\Direction;
use MarsRover\ValueObject\Position;

final class MarsRover
{
    public function __construct(private Position $position, private Direction $direction)
    {
    }

    public function latitude(): int
    {
        return $this->position->latitude();
    }

    public function longitude(): int
    {
        return $this->position->longitude();
    }

    public function direction(): string
    {
        return $this->direction->value();
    }

    public function move(string $commandSet): void
    {
        for ($i = 0; $i < strlen($commandSet); $i++) {
            $command = $commandSet[$i];
            if ($command === 'F') {
                $this->moveForward();
            }
            if ($command === 'R') {
                $this->turnRight();
            }
            if($command === 'L') {
                $this->turnLeft();
            }
        }
    }

    private function moveForward(): void
    {
        if ($this->direction() === Direction::NORTH) {
            $latitude = $this->latitude() +1;
        }
        if ($this->direction() === Direction::EAST) {
            $longitude = $this->longitude() +1;
        }
        if ($this->direction() === Direction::SOUTH) {
            $latitude = $this->latitude() -1;
        }
        if ($this->direction() === Direction::WEST) {
            $longitude = $this->longitude() -1;
        }

        $this->position = new Position(
            $latitude ?? $this->latitude(),
            $longitude ?? $this->longitude()
        );
    }

    private function turnRight(): void
    {
        $direction = Direction::COMPASS[$this->direction()];
        $this->direction = new Direction($direction);
    }

    private function turnLeft(): void
    {
        $direction = array_search($this->direction(), Direction::COMPASS);
        $this->direction = new Direction($direction);
    }
}