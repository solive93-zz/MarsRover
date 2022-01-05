<?php

namespace MarsRover\ValueObject;

use MarsRover\Exception\UnreachablePositionException;

class PlanetMap
{
    private const MIN_HEIGHT_AND_WIDTH = 0;

    public function __construct(
        private int $maxHeight,
        private int $maxWidth,
        private array $obstacles = []
    ) {
    }

    public function maxHeight(): int
    {
        return $this->maxHeight;
    }

    public function maxWidth(): int
    {
        return $this->maxWidth;
    }

    public function nextPositionFor(Position $currentPosition, string $direction): Position
    {
        $lat  = $currentPosition->latitude();
        $long = $currentPosition->longitude();

        if ($direction === Direction::NORTH) {
            $lat = ($lat === $this->maxHeight -1) ? self::MIN_HEIGHT_AND_WIDTH : $lat +1;
        }
        if ($direction === Direction::EAST) {
            $long = ($long === $this->maxWidth -1) ? self::MIN_HEIGHT_AND_WIDTH : $long +1;
        }
        if ($direction === Direction::SOUTH) {
            $lat = ($lat === self::MIN_HEIGHT_AND_WIDTH) ? $this->maxHeight -1 : $lat -1;
        }
        if ($direction === Direction::WEST) {
            $long = ($long === self::MIN_HEIGHT_AND_WIDTH) ? $this->maxWidth -1 : $long -1;
        }

        $nextPosition = new Position($lat, $long);
        if (in_array($nextPosition, $this->obstacles)) {
            throw new UnreachablePositionException($nextPosition);
        }

        return $nextPosition;
    }
}