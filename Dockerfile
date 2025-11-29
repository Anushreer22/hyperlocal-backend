FROM php:8.1-apache

# Install PostgreSQL support
RUN apt-get update && apt-get install -y libpq-dev
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Install MySQLi for compatibility
RUN docker-php-ext-install mysqli

# Enable Apache modules
RUN a2enmod rewrite

# Copy application files
COPY . /var/www/html/

# Set proper permissions
RUN chmod -R 755 /var/www/html/uploads/

WORKDIR /var/www/html
