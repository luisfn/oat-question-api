# oat-question-api

## Introduction

## Dependencies
- Docker
- Docker-compose
- composer
- Ports 8000 and 8080 should be free

## Running App Locally

From the root of the project, execute

```bash
composer install
docker-compose up -d
```

## Switch questions source file

The path to the source file is defined on the .env file. To Switch to another source, just set its value

```bash
INPUT_FILE=../data/questions.json
```

## To be improved

- Add API Tests
- Improve Unit Tests
- Generate translated input files instead of translate the collections
- Switch from the implemented parsers (csv/json) to normalizers
- Include composer into docker image
- Implement POST route (Not sure it was necessary since we are working on files)

## Running tests

```bash
php bin/phpunit
```

## Check code style

```bash
php vendor/bin/phpcs
```

## Fix code style

```bash
php vendor/bin/phpcbf
```