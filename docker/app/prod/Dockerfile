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
        php81-fileinfo \
        php81-ctype \
        php82-pecl-apcu \
        php81-opcache

COPY ./docker/app/config/nginx.conf /etc/nginx/conf.d/default.conf
COPY ./docker/app/config/php.ini /etc/php81/conf.d/settings.ini

COPY . /var/www/html
RUN chown -R nobody:nobody /var/www/html

USER nobody

