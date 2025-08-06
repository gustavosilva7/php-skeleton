FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git unzip zip curl libzip-dev && \
    docker-php-ext-install zip

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.log=/tmp/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
