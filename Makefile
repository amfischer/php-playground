composer:
	docker-compose run app composer install

hello:
	docker-compose run app php app/hello.php

index:
	docker-compose run app php app/index.php

shell:
	docker-compose run app

build:
	docker-compose build

terminal:
	docker-compose exec app bash

logs:
	docker-compose logs --tail 10 --follow
