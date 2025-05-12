#!/bin/bash

# Aspetta che i volumi siano montati
sleep 2

# Installa dipendenze backend
composer install --no-interaction

# Imposta la chiave per JWT
php artisan jwt:secret --force

# Aspetta che il DB sia disponibile (se hai un comando custom tipo db:wait)
php artisan db:wait

# Applica le migrazioni al database
php artisan migrate --force

# Avvia PHP-FPM
exec php-fpm