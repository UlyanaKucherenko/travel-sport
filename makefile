include .env

dc=docker-compose -p ${DOCKER_PROJECT} ${DOCKER_CONFIG}

up:
	@$(dc) up -d

down:
	@$(dc) down

down-volume:
	@$(dc) down -v

build:
	@$(dc) build

ps:
	@$(dc) ps

stop:
	@$(dc) stop

start:
	@$(dc) start



connect_db:
	@$(dc) exec db bash

connect_node:
	@$(dc) exec nodejs sh

connect_webserver:
	@$(dc) exec webserver sh

node:
	@$(dc) exec -w /var/www/triathlonmaster.com/ nodejs npm ci
	@$(dc) exec -w /var/www/biathlonexpert.com/ nodejs npm ci
	@$(dc) exec -w /var/www/kvadratlonworld.com/ nodejs npm ci
	@$(dc) exec -w /var/www/easyduathlon.com/ nodejs npm ci
	@$(dc) exec -w /var/www/ultramarathoners.com/ nodejs npm ci


watch__triathlonmaster.com:
	@$(dc) exec -w /var/www/triathlonmaster.com nodejs npm run watch
watch__biathlonexpert.com:
	@$(dc) exec -w /var/www/biathlonexpert.com nodejs npm run watch
watch__kvadratlonworld.com:
	@$(dc) exec -w /var/www/kvadratlonworld.com nodejs npm run watch
watch__easyduathlon.com:
	@$(dc) exec -w /var/www/easyduathlon.com nodejs npm run watch
watch__ultramarathoners.com:
	@$(dc) exec -w /var/www/ultramarathoners.com nodejs npm run watch


fresh:
	@$(dc) exec -u www -w /var/www/triathlonmaster.com/ 				triathlonmaster_com_web						php artisan migrate:fresh --seed
	@$(dc) exec -u www -w /var/www/biathlonexpert.com/ 				biathlonexpert_com_web					php artisan migrate:fresh --seed
	@$(dc) exec -u www -w /var/www/kvadratlonworld.com/ 				kvadratlonworld_com_web					php artisan migrate:fresh --seed
	@$(dc) exec -u www -w /var/www/easyduathlon.com/ 			easyduathlon_com_web				php artisan migrate:fresh --seed
	@$(dc) exec -u www -w /var/www/ultramarathoners.com/ 		ultramarathoners_com_web			php artisan migrate:fresh --seed

vendor:

	@$(dc) exec -u www -w /var/www/triathlonmaster.com/ 				triathlonmaster_com_web						composer install
	@$(dc) exec -u www -w /var/www/biathlonexpert.com/ 				biathlonexpert_com_web					composer install
	@$(dc) exec -u www -w /var/www/kvadratlonworld.com/ 				kvadratlonworld_com_web					composer install
	@$(dc) exec -u www -w /var/www/easyduathlon.com/ 			easyduathlon_com_web				composer install
	@$(dc) exec -u www -w /var/www/ultramarathoners.com/ 		ultramarathoners_com_web			composer install


key:

	@$(dc) exec -u www -w /var/www/triathlonmaster.com/ 				triathlonmaster_com_web						php artisan key:generate
	@$(dc) exec -u www -w /var/www/biathlonexpert.com/ 				biathlonexpert_com_web					php artisan key:generate
	@$(dc) exec -u www -w /var/www/kvadratlonworld.com/ 				kvadratlonworld_com_web					php artisan key:generate
	@$(dc) exec -u www -w /var/www/easyduathlon.com/ 			easyduathlon_com_web				php artisan key:generate
	@$(dc) exec -u www -w /var/www/ultramarathoners.com/ 		ultramarathoners_com_web			php artisan key:generate

storage_link:

	@$(dc) exec -u www -w /var/www/triathlonmaster.com/ 				triathlonmaster_com_web						php artisan storage:link
	@$(dc) exec -u www -w /var/www/biathlonexpert.com/ 				biathlonexpert_com_web					php artisan storage:link
	@$(dc) exec -u www -w /var/www/kvadratlonworld.com/ 				kvadratlonworld_com_web					php artisan storage:link
	@$(dc) exec -u www -w /var/www/easyduathlon.com/ 			easyduathlon_com_web				php artisan storage:link
	@$(dc) exec -u www -w /var/www/ultramarathoners.com/ 		ultramarathoners_com_web			php artisan storage:link

database-open:
	@$(dc) exec db mysql -uroot -p${DOCKER_PASSWORD} ${DOCKER_DATABASE}

database-dump: start_dump dump-triathlonmaster dump-biathlonexpert dump-kvadratlonworld dump-easyduathlon dump-ultramarathoners end_dump# dump database

start_dump:
	@echo Dump is running...
end_dump:
	@echo Dump has finished...

dump-triathlonmaster: # dump database
	@mkdir -p ./dumps/`date +%F_%R`
	@$(dc) exec db sh -c "mysqldump  -u${DB_USERNAME} -p${DB_PASSWORD} books-triathlonmaster.com 2> /dev/null" > ./dumps/`date +%F_%R`/books-triathlonmaster.com.sql

dump-biathlonexpert: # dump database
	@mkdir -p ./dumps/`date +%F_%R`
	@$(dc) exec db sh -c "mysqldump  -u${DB_USERNAME} -p${DB_PASSWORD} books-biathlonexpert.com 2> /dev/null" > ./dumps/`date +%F_%R`/books-biathlonexpert.com.sql

dump-kvadratlonworld: # dump database
	@mkdir -p ./dumps/`date +%F_%R`
	@$(dc) exec db sh -c "mysqldump  -u${DB_USERNAME} -p${DB_PASSWORD} books-kvadratlonworld.com 2> /dev/null" > ./dumps/`date +%F_%R`/books-kvadratlonworld.com.sql

dump-easyduathlon: # dump database
	@mkdir -p ./dumps/`date +%F_%R`
	@$(dc) exec db sh -c "mysqldump  -u${DB_USERNAME} -p${DB_PASSWORD} books-easyduathlon.com 2> /dev/null" > ./dumps/`date +%F_%R`/books-easyduathlon.com.sql

dump-ultramarathoners: # dump database
	@mkdir -p ./dumps/`date +%F_%R`
	@$(dc) exec db sh -c "mysqldump  -u${DB_USERNAME} -p${DB_PASSWORD} books-ultramarathoners.com 2> /dev/null" > ./dumps/`date +%F_%R`/books-ultramarathoners.com.sql
watch_triathlonmaster.com:
	@$(dc) exec -w /var/www/triathlonmaster.com nodejs npm run watch
watch_biathlonexpert.com:
	@$(dc) exec -w /var/www/biathlonexpert.com nodejs npm run watch
watch_kvadratlonworld.com:
	@$(dc) exec -w /var/www/kvadratlonworld.com nodejs npm run watch
watch_easyduathlon.com:
	@$(dc) exec -w /var/www/easyduathlon.com nodejs npm run watch
watch_ultramarathoners.com:
	@$(dc) exec -w /var/www/ultramarathoners.com nodejs npm run watch
npm_triathlonmaster.com:
	@$(dc) exec -w /var/www/triathlonmaster.com nodejs npm i
npm_biathlonexpert.com:
	@$(dc) exec -w /var/www/biathlonexpert.com nodejs npm i
npm_kvadratlonworld.com:
	@$(dc) exec -w /var/www/kvadratlonworld.com nodejs npm i
npm_easyduathlon.com:
	@$(dc) exec -w /var/www/easyduathlon.com nodejs npm i
npm_ultramarathoners.com:
	@$(dc) exec -w /var/www/ultramarathoners.com nodejs npm i

descriptors_all: descriptors_drmepay.com descriptors_fntsepay.com descriptors_rmcnpay.com descriptors_blitpay.com descriptors_radvpay.com

descriptors_drmepay.com:
	@$(dc) exec -w /var/www/descriptors/drmepay.com nodejs npm run build
descriptors_fntsepay.com:
	@$(dc) exec -w /var/www/descriptors/fntsepay.com nodejs npm run build
descriptors_rmcnpay.com:
	@$(dc) exec -w /var/www/descriptors/rmcnpay.com nodejs npm run build
descriptors_blitpay.com:
	@$(dc) exec -w /var/www/descriptors/blitpay.com nodejs npm run build
descriptors_radvpay.com:
	@$(dc) exec -w /var/www/descriptors/radvpay.com nodejs npm run build

node_modules_drmepay.com:
	@$(dc) exec -w /var/www/descriptors/drmepay.com nodejs npm ci
node_modules_fntsepay.com:
	@$(dc) exec -w /var/www/descriptors/fntsepay.com nodejs npm ci
node_modules_rmcnpay.com:
	@$(dc) exec -w /var/www/descriptors/rmcnpay.com nodejs npm ci
node_modules_blitpay.com:
	@$(dc) exec -w /var/www/descriptors/blitpay.com nodejs npm ci
node_modules_radvpay.com:
	@$(dc) exec -w /var/www/descriptors/radvpay.com nodejs npm ci
