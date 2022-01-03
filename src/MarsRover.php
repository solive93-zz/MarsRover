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
        $compass = ['N', 'O', 'S', 'E'];
        $currentLatitude  = $this->latitude();
        $currentLongitude = $this->longitude();
        $numericDirection = array_search($this->direction, $compass);

        for ($i = 0; $i < strlen($commandSet); $i++) {
            $command = $commandSet[$i];
            if ($command === 'F') {
                $currentLatitude += 1;
            }
            if ($command === 'R') {
                $numericDirection += 1;
            }
        }

        $this->position = new Position($currentLatitude, $currentLongitude);
        $this->direction = $compass[$numericDirection % count($compass)];
    }
}