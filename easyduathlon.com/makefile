include ../.env
include .env

dc=cd .. ; docker-compose -p ${DOCKER_PROJECT} ${DOCKER_CONFIG}

app=easyduathlon_com_web
mount=/var/www/easyduathlon.com



echo:
	@echo $(app)

connect_db:
	@$(dc) exec db bash

connect_webserver:
	@$(dc) exec webserver sh

connect_node:
	@$(dc) exec -u www -w $(mount) nodejs sh

npm_i:
	@$(dc) exec -u www -w $(mount) nodejs npm i

watch:
	@$(dc) exec -u www -w $(mount) nodejs npm run watch

build:
	@$(dc) exec -u www -w $(mount) nodejs npm run prod

connect_app:
	@$(dc) exec -u www -w $(mount) $(app) sh

fresh:
	@$(dc) exec -u www -w $(mount) $(app) php artisan migrate:fresh --seed

vendor_deps:
	@$(dc) exec -u www -w $(mount) $(app) composer global require hirak/prestissimo
	@$(dc) exec -u www -w $(mount) $(app) composer install

key:
	@$(dc) exec -u www -w $(mount) $(app) php artisan key:generate

storage_link:
	@$(dc) exec -u www -w $(mount) $(app) php artisan storage:link

test:
	@$(dc) exec -u www -w $(mount) $(app) php vendor/bin/phpunit

composer_dump:
	@$(dc) exec -u www -w $(mount) $(app) composer dump-autoload

database_dump:
	@$(dc) exec db bash -c "mysqldump ${DB_DATABASE} -u${DB_USERNAME} -p${DB_PASSWORD} 2> /dev/null"

certbot:
	@docker run -it --rm --name certbot -v "/etc/letsencrypt:/etc/letsencrypt" -v "/var/lib/letsencrypt:/var/lib/letsencrypt" certbot/certbot certonly

