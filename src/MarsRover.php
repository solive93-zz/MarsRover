<?php

declare(strict_types=1);

namespace MarsRover;

use MarsRover\ValueObject\Direction;
use MarsRover\ValueObject\Position;

final class MarsRover
{
    public function __construct(private Position $position, private string $direction)
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
        return $this->direction;
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
        $this->position = new Position($this->latitude() +1, $this->longitude());
    }

    private function turnRight(): void
    {
        $this->direction = Direction::COMPASS[$this->direction];
    }

    private function turnLeft(): void
    {
        $direction = array_search($this->direction, Direction::COMPASS);
        $this->direction = $direction;
    }
}