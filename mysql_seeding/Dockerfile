FROM php:7.2
RUN docker-php-ext-install mysqli
COPY seed-mysql.php /
CMD php /seed-mysql.php
