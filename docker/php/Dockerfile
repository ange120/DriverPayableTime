FROM php:8.1.1-fpm

WORKDIR /var/www

RUN apt-get clean && apt-get update \
    &&  apt-get install -y --no-install-recommends \
        locales \
        apt-utils \
        git \
        libicu-dev \
        g++ \
        libpng-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        libxslt-dev \
        unzip \
        libpq-dev \
        nodejs \
        npm \
        wget \
        apt-transport-https \
        lsb-release \
        ca-certificates

# Install Node.js 14.x
RUN curl -fsSL https://deb.nodesource.com/setup_14.x | bash - \
    && apt-get install -y nodejs

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    &&  mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-configure \
            intl \
    &&  docker-php-ext-install \
            pdo pdo_mysql pdo_pgsql opcache intl zip calendar dom mbstring gd xsl pcntl

RUN pecl install redis

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY --chown=www:www . /var/www

USER www

EXPOSE 9000
CMD ["php-fpm"]