FROM php:8.1-fpm

RUN docker-php-ext-install pdo pdo_mysql
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

ADD config/docker-xdebug.ini /usr/local/etc/php/conf.d/docker-xdebug.ini

WORKDIR /var/www
