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
        $currentLatitude  = $this->latitude();
        $currentLongitude = $this->longitude();

        for ($i = 0; $i < strlen($commandSet); $i++) {
            $currentLatitude += 1;
        }

        $this->position = new Position($currentLatitude, $currentLongitude);
    }
}