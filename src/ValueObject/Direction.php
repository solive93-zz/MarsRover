<?php

namespace MarsRover\ValueObject;

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
    }

    public function value(): string
    {
        return $this->value;
    }
}