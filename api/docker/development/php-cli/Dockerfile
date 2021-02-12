FROM php:7.4-cli-alpine

RUN apk update && apk add --update unzip
RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./common/php/conf.d /usr/local/etc/php/conf.d

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet \
# hirak/prestissimo не запустился
#    && composer global require hirak/prestissimo --no-plugins --no-scripts \
#    && rm -rf /root/.composer/cache

WORKDIR /app

