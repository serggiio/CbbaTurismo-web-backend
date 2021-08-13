#PHP version >7.0

#STEPS
	composer update --ignore-platform-reqs
    
	composer install --ignore-platform-reqs
    
    edit .env on root directory.
        DB_DATABASE=turismo
    php artisan key:generate
    Database location: root directory > turismo.sql

Route example:
    index: http://192.168.0.3/turismo/
    admin: http://192.168.0.3/turismo/public/admin
