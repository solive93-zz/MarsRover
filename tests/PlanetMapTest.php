<?php

namespace MarsRover\Tests;

use MarsRover\ValueObject\PlanetMap;
use PHPUnit\Framework\TestCase;

class PlanetMapTest extends TestCase
{
    public function test_planet_map_should_be_instantiated_with_given_sizes()
    {
        $map = new PlanetMap(10, 10);

        $this->assertEquals(10, $map->maxHeight());
        $this->assertEquals(10, $map->maxWidth());
    }
}
