# Sending email asynchronously using Symfony Messenger and RabbitMQ

This tutorial is an example of sending email asynchronously using symfony/messenger and RabbitMQ.

In the app directory lives our application source code.

The utils directory Docker's services needed. 

## Requirements

* [Docker](https://docs.docker.com/engine/install/)
* [Docker Compose](https://docs.docker.com/compose/install/)

## Docker Services

* Nginx
* MySQL 8.0
* PHP 7.4
* RabbitMQ
* PHPMyAdmin
* MailHog

## Installation

After cloning the repository.

### Step 1 -- .env
You can change all variables and ports defined in the utils/docker/.env file.

### Step 2 -- Build

```bash
cd utils/docker

docker-compose build
```
You can use the Makefile to build :
```bash
make build
```

### Step 3 -- Symfony app install

```bash
docker-compose run --rm php bash

composer install
```

## Usage

### Start
```bash
docker-compose up -d

# same thing here you can use the Makefile
make up
```

### Stop
```bash
docker-compose down --remove-orphans

# same thing here you can use the Makefile
make down
```

## License
[MIT](https://choosealicense.com/licenses/mit/)
