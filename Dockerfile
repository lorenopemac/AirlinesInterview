ARG php_version 

FROM php:${php_version}

# INSTALL ZIP TO USE COMPOSER
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip
RUN docker-php-ext-install zip

# INSTALL AND UPDATE COMPOSER
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer self-update
WORKDIR /usr/src/app
COPY . .

# SET WORKDIR PERMISSION
RUN chown -R www-data:www-data /usr/src/app
RUN chmod 755 /usr/src/app

# INSTALL YOUR DEPENDENCIES
RUN composer install 