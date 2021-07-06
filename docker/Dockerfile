FROM php:7.2-apache
MAINTAINER aisol

COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./start-apache /usr/local/bin

RUN a2enmod rewrite

RUN chown -R www-data:www-data /var/www

RUN pecl install xdebug-2.9.6 \
    && docker-php-ext-enable xdebug

RUN apt-get update && \
    apt-get -y install \
        gnupg2 && \
    apt-key update && \
    apt-get update && \
    apt-get -y install \
            g++ \
            git \
            curl \
            libfreetype6-dev libjpeg62-turbo-dev libpng-dev libgmp-dev libldap2-dev \
            libmcrypt-dev \
            libicu-dev \
            libxml2-dev \
            imagemagick \
            libcurl3-dev \
            libicu-dev \
            libonig-dev \
            libmagickwand-dev \
            libpq-dev \
            libxml2-dev \
            libzip-dev \
            zlib1g-dev \
            default-mysql-client \
            openssh-client \
            nano \
            unzip \
            libcurl4-openssl-dev \
            libssl-dev \
        --no-install-recommends && \
        apt-get clean && \
        rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN  docker-php-ext-configure \
    gd --with-gd --with-jpeg-dir --with-png-dir --with-freetype-dir && \
    docker-php-ext-configure bcmath && \
    docker-php-ext-install \
        soap \
        zip \
        curl \
        bcmath \
        exif \
        gd \
        iconv \
        intl \
        mbstring \
        opcache \
        pdo_mysql \
        pdo_pgsql

RUN pecl install \
        imagick \
        mongodb && \
    docker-php-ext-enable \
        imagick \
        mongodb

COPY ./php.ini /usr/local/etc/php/php.ini

CMD ["start-apache"]
