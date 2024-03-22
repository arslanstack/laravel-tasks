FROM php:8.2-apache

  

WORKDIR /var/www/html

  

RUN apt-get update && apt-get install -y \

    libzip-dev \

    unzip \

    && docker-php-ext-install zip pdo_mysql

  

COPY . /var/www/html/

  

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

  

EXPOSE 80