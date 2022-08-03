FROM php:8.1-apache

#
RUN a2enmod rewrite headers

COPY ./.docker/ /etc/apache2/sites-enabled/

#
RUN apt-get update

RUN apt-get install -y libpq-dev

RUN docker-php-ext-install pdo pdo_pgsql

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

#
WORKDIR /var/www/html/

COPY . .

RUN chmod -R 777 ./storage/

EXPOSE 80
