FROM php:7.3-fpm

MAINTAINER Luis Fernando do Nascimento <luisfn@gmail.com>

RUN pecl install apcu

RUN docker-php-ext-install pdo opcache && \
    docker-php-ext-enable apcu

RUN usermod -u 1000 www-data

RUN mkdir -p /www && \
    chown -R www-data /www