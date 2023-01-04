FROM php:8.1.13-fpm

RUN apt-get update \
    && apt-get install -y --no-install-recommends build-essential libzip-dev zip zlib1g-dev libicu-dev unzip g++

RUN docker-php-ext-install pdo pdo_mysql zip
RUN docker-php-ext-configure intl && docker-php-ext-install intl

RUN apt-get update \
    && apt-get install -qy --no-install-recommends \
    curl \
    debconf \
    subversion \
    git \
    wget

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls \
    && mv composer.phar /usr/local/bin/composer

RUN wget https://github.com/FriendsOfPHP/PHP-CS-Fixer/releases/download/v3.4.0/php-cs-fixer.phar -O php-cs-fixer
RUN chmod a+x php-cs-fixer && mv php-cs-fixer /usr/local/bin/php-cs-fixer

RUN apt-get purge -y --auto-remove \
    && apt-get -y clean \
    && rm -r /var/lib/apt/lists/*

RUN echo "dev ALL=(ALL) ALL" > /etc/sudoers
