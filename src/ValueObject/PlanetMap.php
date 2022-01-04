<?php

namespace MarsRover\ValueObject;

class PlanetMap
{
    public function __construct(private int $maxHeight, private int $maxWidth, private ?array $obstaclePosition = null)
    {
    }

    public function maxHeight(): int
    {
        return $this->maxHeight;
    }

    public function maxWidth(): int
    {
        return $this->maxWidth;
    }

    public function getObstaclePosition(): array
    {
        return $this->obstaclePosition;
    }
}