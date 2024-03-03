# Use the official PHP image
FROM php:8.0-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the PHP files from your repository to the container
COPY . .

# Expose port 80 to allow incoming connections
EXPOSE 80

# Start Apache server when the container starts
CMD ["apache2-foreground"]
