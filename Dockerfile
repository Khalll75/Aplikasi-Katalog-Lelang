FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy everything
COPY . /var/www/html

# Move Laravel's public directory to Apache's root
RUN rm -rf /var/www/html/index.html \
    && cp -r public/* /var/www/html/

# Set proper permissions (optional but useful)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Set environment variables for Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html

# Restart apache
CMD ["apache2-foreground"]
