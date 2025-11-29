FROM php:8.1-apache
RUN apt-get update && apt-get install -y 
    libpng-dev 
    libjpeg-dev 
    libfreetype6-dev 
    libonig-dev 
    libxml2-dev 
    zip 
    curl 
    unzip 
    && docker-php-ext-configure gd --with-freetype --with-jpeg 
    && docker-php-ext-install gd mysqli pdo pdo_mysql mbstring exif pcntl bcmath
RUN a2enmod rewrite
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 755 /var/www/html/uploads/
WORKDIR /var/www/html
