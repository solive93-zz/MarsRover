<?php

declare(strict_types=1);

namespace MarsRover\ValueObject;

final class Position
{
    public function __construct(private int $latitude, private int $longitude)
    {
    }

    public function latitude(): int
    {
        return $this->latitude;
    }

    public function longitude(): int
    {
        return $this->longitude;
    }

    public function nextPositionWhenFacing(string $direction): self
    {
        if ($direction === Direction::NORTH) {
            $latitude = $this->latitude() +1;
        }
        if ($direction === Direction::EAST) {
            $longitude = $this->longitude() +1;
        }
        if ($direction === Direction::SOUTH) {
            $latitude = $this->latitude() -1;
        }
        if ($direction === Direction::WEST) {
            $longitude = $this->longitude() -1;
        }

        return new Position(
            $latitude ?? $this->latitude(),
            $longitude ?? $this->longitude()
        );
    }
}