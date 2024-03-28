FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    nginx \
    libpng-dev \
    libjpeg-dev \
    libpq-dev \
    git \
    curl \
    zip \
    unzip\
    && rm -rf /var/lib/apt/lists/*

COPY ./nginx.conf /etc/nginx/sites-available/default

COPY . /var/www

WORKDIR /var/www

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www

CMD service nginx start && php-fpm
