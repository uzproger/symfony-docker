FROM trafex/php-nginx:3.1.0

USER root

RUN apk add --no-cache php81-pdo \
        php81-pdo_mysql \
        php81-zip \
        php81-intl \
        php81-simplexml \
        php81-tokenizer \
        php81-xmlwriter \
        php81-iconv \
        php81-sodium \
        php81-ctype \
        php81-fileinfo \
        curl \
        git \
        wget

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls \
    && mv composer.phar /usr/local/bin/composer

RUN wget https://github.com/FriendsOfPHP/PHP-CS-Fixer/releases/download/v3.4.0/php-cs-fixer.phar -O php-cs-fixer
RUN chmod a+x php-cs-fixer && mv php-cs-fixer /usr/local/bin/php-cs-fixer
