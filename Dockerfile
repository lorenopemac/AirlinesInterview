ARG php_version 

FROM php:${php_version}

# INSTALL ZIP TO USE COMPOSER
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip
RUN docker-php-ext-install zip

#RUN apt-get install -y libz-dev libmemcached-dev && \
#    pecl install memcached && \
#    docker-php-ext-enable memcached

#RUN pecl install -o -f redis \
#    &&  rm -rf /tmp/pear \
#    &&  docker-php-ext-enable redis
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