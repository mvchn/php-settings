SHELL := /bin/bash

setup:
	composer install
.PHONY: setup

test:
	php vendor/bin/phpunit tests
.PHONY: tests