FROM php:5.6-apache
# Install pdo_mysql
RUN apt-get update \
    && docker-php-ext-install pdo_mysql mysqli mysql && docker-php-ext-enable mysqli && a2enmod rewrite && apache2ctl restart