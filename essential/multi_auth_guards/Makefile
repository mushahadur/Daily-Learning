setup:
	@make build
	@make up 
	@make composer-update
build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
up:
	docker-compose up -d
composer-update:
	docker exec multi_auth_guards bash -c "composer update"
data:
	docker exec multi_auth_guards bash -c "php artisan migrate"
	docker exec multi_auth_guards bash -c "php artisan db:seed"
art:
	docker exec multi_auth_guards bash -c "php artisan $(var)"
fstart:
	git flow feature start $(var)
fpub:
	git flow feature publish $(var)
root-bash:
	docker exec -it multi_auth_guards bash
