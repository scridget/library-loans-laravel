FROM php:7.4-fpm-alpine3.13

RUN apk upgrade --update \
  && apk add \
     git \
     libzip-dev \
     zlib-dev \
     nginx \
  && docker-php-ext-install pdo_mysql zip
  
RUN curl -sS https://getcomposer.org/installer | php

RUN mv composer.phar /usr/local/bin/composer

RUN apk add --no-cache nodejs-npm

WORKDIR /var/www/html
