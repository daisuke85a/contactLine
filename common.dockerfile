FROM php:7.3-fpm

RUN apt-get update \
    && apt-get install -y git zlib1g-dev libzip-dev unzip \
    && docker-php-ext-install zip pdo_mysql sockets

RUN curl -sS https://getcomposer.org/installer \
    | php -- --install-dir=/usr/bin --filename=composer
