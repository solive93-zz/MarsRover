.PHONY: tests dependencies coverage docker-build docker-tests docker-coverage

# Targets
docker_build := docker build -t
name 		 := mars_rover
docker_run   := docker run --rm -v ${PWD}:/opt/project

# Docker commands
default:
	@printf "$$HELP"

build:
	$(docker_build) $(name) .
	@$(docker_run) $(name) composer install

tests:
	@$(docker_run) $(name) ./vendor/bin/phpunit --color=always

coverage:
	@$(docker_run) $(name) -dxdebug.mode=coverage ./vendor/bin/phpunit --coverage-text

define HELP
Allowed Commands:
	- make build\tCreates a PHP image with xdebug and install the dependencies
	- make tests\tRun the tests on docker
	- make coverage\tRun the code coverage
 Please execute "make <command>". Example make help

endef

export HELP