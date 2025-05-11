FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    zip unzip git curl libonig-dev libxml2-dev libzip-dev libpq-dev libjpeg-dev libpng-dev libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm
    
WORKDIR /var/www/html
