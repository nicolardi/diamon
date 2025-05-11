#!/bin/bash

# Wait for volumes to be available (optional)
sleep 2

# Install backend dependencies
composer install --no-interaction

# Install frontend dependencies
npm install

php artisan db:wait
# Run artisan commands
php artisan migrate --force
php artisan jwt:secret --force
php artisan db:seed --force

# Start PHP-FPM
exec php-fpm
