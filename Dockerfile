FROM php:8.1 as php

RUN apt-get update -y
RUN apt-get install -y unzip libpq-dev lib-curl4-gnutls-dev
RUN docker-php-ext-install pdo pdo-mysql bcmatch

RUN precl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis


WORKDIR /var/www

COPY . .


COPY --from=composer:2.3.5 /user/bin/composer /user/bin/composer



ENV PORT=8000
ENTRYPOINT [ "Docker/entrypoint.sh" ]