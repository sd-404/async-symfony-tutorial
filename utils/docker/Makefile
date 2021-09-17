UID := $(shell id -u)

build:
    export LOCAL_UID=${UID} ; export LOCAL_USER=${USER} ; docker-compose build
.PHONY: build

up:
    export LOCAL_UID=${UID} ; export LOCAL_USER=${USER} ; docker-compose up -d
.PHONY: up

down:
    export LOCAL_UID=${UID} ; export LOCAL_USER=${USER} ; docker-compose down --remove-orphans
.PHONY: down
