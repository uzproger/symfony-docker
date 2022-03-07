FROM php:8.1-fpm

RUN apt-get update \
    && apt-get install -y --no-install-recommends build-essential libzip-dev zip zlib1g-dev libicu-dev unzip g++

RUN docker-php-ext-install pdo pdo_mysql zip
RUN docker-php-ext-configure intl && docker-php-ext-install intl

EXPOSE 9000
CMD ["php-fpm"]
