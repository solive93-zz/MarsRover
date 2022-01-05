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
}