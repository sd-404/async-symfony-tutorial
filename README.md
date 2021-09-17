# Sending email asynchronously using Symfony Messenger and RabbitMQ

The symfony project lives in the app directory
Dev stacks needed are in the utils docker dir.

## Dev stack 
> cd utils/docker
> make build

or

> docker-compose build

then 

> make up

or 

> docker-compose up -d 

## Symfony app

To run the application after all containers are up and running

> docker-compose run --rm php bash 

> composer install


