# Use the official PHP image
FROM php:8.0-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Install PDO PostgreSQL extension
RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copy the PHP files from your repository to the container
COPY . .

# Expose port 80 to allow incoming connections
EXPOSE 80

# Start Apache server when the container starts
CMD ["apache2-foreground"]
