.PHONY: build up down init bash phpstan phpcs phpcbf

build:
	docker compose build

up:
	docker compose up -d

down:
	docker compose down

init:
	docker compose up -d
	docker compose exec php composer create-project symfony/skeleton /var/www/html --no-interaction

bash:
	docker compose exec php bash

phpstan:
	docker compose exec php composer phpstan

phpcs:
	docker compose exec php composer phpcs

phpcbf:
	docker compose exec php composer phpcbf
