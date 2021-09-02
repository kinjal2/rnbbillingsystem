SHELL := /bin/bash

start:
	php artisan 

migration-create:	## creates migration in the migration directory  -- make migration-create name="migration_file_name"
	php artisan make:migration $(name)

migration-up:	## runs migrations from migrations directory
	php artisan migrate

migration-seed: ## load database with seeders data
	php artisan db:seed

migration-create-seed:	## creates migration seed
	php artisan make:seeder $(name)

migration-down:	## rollback ran migrations, you can provide step argument which will only rollback migrations to certain steps -- make migration-down step=1
	php artisan migrate:rollback --step=$(step)


config-cache:	## clears configuration caches of laravel
	php artisan config:cache

optimize-clear:	## clears all the caches of laravel
	php artisan optimize:clear
