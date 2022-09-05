ARG php_version 

FROM php:${php_version}

# INSTALL ZIP TO USE COMPOSER
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip
RUN docker-php-ext-install zip

# COMPOSER INSTALLATION
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer self-update
WORKDIR /var/www/html
COPY . .
COPY .htaccess .

# SET WORKDIR PERMISSION
RUN chown -R www-data:www-data /var/www/html
RUN chmod 755 /var/www/html 
  

# INSTALL YOUR DEPENDENCIES
RUN composer install 
  