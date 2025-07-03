main: bash

bash:
	docker exec -it php-skeleton-app-1 bash

test:
	docker exec -it php-skeleton-app-1 bash -c "./vendor/bin/phpunit --testdox tests"

fix:
	docker exec -it php-skeleton-app-1 bash -c "./vendor/bin/php-cs-fixer fix --diff"