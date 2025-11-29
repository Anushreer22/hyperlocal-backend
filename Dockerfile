FROM php:8.1-apache

# Install MySQLi and other extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache modules
RUN a2enmod rewrite

# Copy application files
COPY . /var/www/html/

# Set proper permissions
RUN chmod -R 755 /var/www/html/uploads/

WORKDIR /var/www/html
