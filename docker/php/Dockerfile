# Use the official PHP 8.2 Apache base image
FROM php:8.2-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy composer.json and composer.lock
COPY src/composer.json src/composer.lock ./

# Install PHP extensions and other dependencies
RUN apt-get update && \
    apt-get install -y libzip-dev zip && \
    docker-php-ext-install pdo pdo_mysql mysqli zip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Enable Apache modules
RUN a2enmod rewrite

# Copy the rest of the application code
COPY src/ .

# Expose port 80 to the outside world
EXPOSE 80
