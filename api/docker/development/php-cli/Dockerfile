FROM php:7.4-cli-alpine

RUN apk update && apk add --update unzip
#RUN apk add -U --no-cache unzip && rm -rf /var/cache/apk/*
RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./common/php/conf.d /usr/local/etc/php/conf.d

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet

WORKDIR /app

