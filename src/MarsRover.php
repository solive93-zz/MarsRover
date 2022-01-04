<?php

declare(strict_types=1);

namespace MarsRover;

use MarsRover\ValueObject\Direction;
use MarsRover\ValueObject\Position;

final class MarsRover
{
    public function __construct(private Position $position, private Direction $direction)
    {
    }

    public function move(string $commandSet): void
    {
        for ($i = 0; $i < strlen($commandSet); $i++) {
            $command = $commandSet[$i];
            if ($command === 'F') {
                $this->position = $this->position->nextPositionWhenFacing($this->direction());
            }
            if ($command === 'R') {
                $this->direction = $this->direction->right();
            }
            if($command === 'L') {
                $this->direction = $this->direction->left();
            }
        }
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
        return $this->direction->value();
    }
}