FROM php:apache
RUN apt update
COPY index.php /var/www/html/index.php
