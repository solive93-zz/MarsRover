<?php

declare(strict_types=1);

namespace MarsRover;

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
        $compass = ['N', 'E', 'S', 'O'];
        $numericDirection = array_search($this->direction, $compass);
        $numericDirection += 1;

        $this->direction =  $compass[$numericDirection % count($compass)];
    }

    private function turnLeft(): void
    {
        $compass = ['N', 'E', 'S', '0'];
        $numericDirection = array_search($this->direction, $compass);
        $numericDirection -= 1;
        $numericDirection += $numericDirection < 0 ? count($compass) : 0;

        $this->direction =  $compass[$numericDirection % count($compass)];
    }
}