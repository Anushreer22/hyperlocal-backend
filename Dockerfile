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

# Create uploads directories and set proper permissions
RUN mkdir -p /var/www/html/uploads/licenses /var/www/html/uploads/products
RUN chown -R www-data:www-data /var/www/html/uploads/
RUN chmod -R 755 /var/www/html/uploads/

# Set ownership of entire html directory to Apache user
RUN chown -R www-data:www-data /var/www/html/

WORKDIR /var/www/html
