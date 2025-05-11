#!/bin/bash

# Wait for volumes to be available (optional)
sleep 2

# Install backend dependencies
composer install --no-interaction
php artisan jwt:secret --force
# Install frontend dependencies
php artisan db:wait
# Run artisan commands
php artisan migrate --force
php artisan db:seed --force

# Start PHP-FPM
exec php-fpm
