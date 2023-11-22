# Use the official PHP image with Apache
FROM php:7.4-apache

# Enable Apache modules and install dependencies
RUN a2enmod rewrite
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql

# Set the working directory
WORKDIR /var/www/html

# Copy project files to the container
COPY .. /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install project dependencies
RUN composer install

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]

# Install cron
RUN apt-get update && apt-get -y install cron

# Copy the script and make it executable
COPY cronjob /etc/cron.d/cronjob
RUN chmod 0644 /etc/cron.d/cronjob

# Run the cron job
CMD ["cron", "-f"]