# Mars Rover Mission
You’re part of the team that explores Mars by sending remotely controlled vehicles to the surface
of the planet. Develop a software that translates the commands sent from earth to instructions
that are understood by the rover.

## Requirements
● You are given the initial starting point (`'x', 'y'`) of a rover and the direction (`'N', 'S', 'E', 'O'`)
it is facing.

● The rover receives a collection of commands. (E.g.) `'FFRRFFFRL'`

● The rover can move forward (`'F'`).

● The rover can move left/right (`'R'`, `'L'`).

● Suppose we are on a really weird planet that is square. 200x200 for example :)

● Implement obstacle detection before each move to a new square. If a given
sequence of commands encounters an obstacle, the rover moves up to the last
possible point, aborts the sequence and reports the obstacle.

## Project SetUp
### Locally
If you already have php and composer installed in your system you can run the following commands:

1. Install project dependencies via composer
````
composer install 
````
2. Run phpunit test suite
````
vendor/bin/phpunit 
````
### Using Docker
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
make build
````