migrate-tables:
	php artisan migrate

install-laravel-deps:
	composer install

run: install-laravel-deps migrate-tables
	php artisan serve --host=0.0.0.0

test:
	phpunit
