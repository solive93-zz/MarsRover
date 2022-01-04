<?php

namespace MarsRover\ValueObject;

use MarsRover\Exception\InvalidDirectionException;

class Direction
{
    public const NORTH   = 'N';
    public const EAST    = 'E';
    public const SOUTH   = 'S';
    public const WEST    = 'W';
    public const COMPASS = [
        self::NORTH => self::EAST,
        self::EAST  => self::SOUTH,
        self::SOUTH => self::WEST,
        self::WEST  => self::NORTH
    ];

    public function __construct(private string $value = self::NORTH)
    {
        $this->ensureIsValidDirection($this->value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function right(): self
    {
        $direction = Direction::COMPASS[$this->value];
        return new Direction($direction);
    }

    public function left(): self
    {
        $direction = array_search($this->value, Direction::COMPASS);
        return new Direction($direction);
    }

    private function ensureIsValidDirection(string $direction): void
    {
        if (!in_array($direction, self::COMPASS)) {
            throw new InvalidDirectionException();
        }
    }
}