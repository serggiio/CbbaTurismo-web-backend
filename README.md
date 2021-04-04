#PHP version >7.0

#STEPS
	composer update --ignore-platform-reqs
	composer install --ignore-platform-reqs
    
    edit .env on root directory.
        DB_DATABASE=turismo
    php artisan key:generate
    Database location: root directory > turismo.sql
