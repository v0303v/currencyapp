FROM php:7.4-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    curl \
    libzip-dev \
    libpq-dev \
    zlib1g \
    libwebp-dev libjpeg62-turbo-dev libpng-dev libxpm-dev libfreetype6-dev \
    cron

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install zip

RUN pecl install https://xdebug.org/files/xdebug-3.1.2.tgz \
    && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./app .

CMD ["php-fpm"]