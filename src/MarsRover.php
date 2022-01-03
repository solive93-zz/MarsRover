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

    public function direction()
    {
        return $this->direction;
    }

    public function move(string $commandSet)
    {
        for ($i = 0; $i < strlen($commandSet); $i++) {
            $command = $commandSet[$i];
            if ($command === 'F') {
                $this->moveForward();
            }
            if ($command === 'R') {
                $this->turnRight();
            }
        }
    }

    private function moveForward()
    {
        $this->position = new Position($this->latitude() +1, $this->longitude());
    }

    private function turnRight()
    {
        $compass = ['N', 'O', 'S', 'E'];
        $numericDirection = array_search($this->direction, $compass);
        $numericDirection += 1;

        $this->direction =  $compass[$numericDirection % count($compass)];
    }
}