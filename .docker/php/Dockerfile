FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git unzip zip curl libzip-dev && \
    docker-php-ext-install zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
