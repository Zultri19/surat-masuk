FROM php:8.2-cli

# install extension yang dibutuhkan Laravel
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app

COPY . .

RUN apt-get update && apt-get install -y unzip git
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install --no-dev --optimize-autoloader

CMD php -S 0.0.0.0:$PORT -t public