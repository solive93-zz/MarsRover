# Mars Rover Mission
You’re part of the team that explores Mars by sending remotely controlled vehicles to the surface
of the planet. Develop a software that translates the commands sent from earth to instructions
that are understood by the rover.

## Requirements
● You are given the initial starting point (`'x', 'y'`) of a rover and the direction (`'N', 'S', 'E', 'W'`)
it is facing.

● The rover receives a collection of commands. (E.g.) `'FFRRFFFRL'`

● The rover can move forward (`'F'`).

● The rover can move left/right (`'R'`, `'L'`).

● Suppose we are on a really weird planet that is square. 200x200 for example :)

● Implement obstacle detection before each move to a new square. If a given
sequence of commands encounters an obstacle, the rover moves up to the last
possible point, aborts the sequence and reports the obstacle.

# Project SetUp
## Locally
If you already have php and composer installed in your system you can run the following commands:

1. Install project dependencies via composer
````
composer install 
````
2. Run phpunit test suite
````
vendor/bin/phpunit 
````
## Using Docker
1. Build
````
make build
````
2. Run tests
````
make tests
````
3. Run tests with coverage
````
make coverage
````

# My solution
● Since it was not specified. I assumed that the Rover would need a `PlanetMap` it has to explore, its current 
`Position` and the `Direction` it is facing in order to be instantiated. All those are `ValueObjects`. 

● I called the Rover's function that process the commands `move()` and receive a capitalized string of `L`, `R`, `F` as stated in the Mars Rover Mission explanation above. For example `FRFFLF`.

● When Mars Rover is positioned in the northern edge of the planet map and facing north, and a Forward command is given, since planets are spherical, it will appear on the southest edge of the map. For instance, if it is located at `10,0` in a planet with size `9 x 9`, it is facing `North` and receives a `F` command, it will appear at position `0, 0` 

● Obstacles are passed as an array of Positions where they are located, as the third argument of PlanetMap. When Rover encounters and obstacle, an exception is thrown, so it stops at last possible position, aborts the resto of the command sequence and reports the obstacle.

● At the beginning, MarsRover's move() function return statement was typehinted as void. But after implementing obstacle detection and obstacle reporting, I changed the return type to string

● Position reporting will follow this format: `latitude:longitude:direction`. For example: `1:1:W`.

### Next steps (not implemented)
● Add an extra abstraction layer. I was thinking of creating a `CommandSet` (a Collection of `Commands::class`), processed by some other class (¿¿called `Engine`??). 