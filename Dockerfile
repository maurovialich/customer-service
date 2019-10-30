FROM php:5.6-apache
RUN a2enmod rewrite
RUN docker-php-ext-install mysqli
RUN apt-get update && \
    apt-get install -y --no-install-recommends git zip

RUN curl --silent --show-error https://getcomposer.org/installer | php