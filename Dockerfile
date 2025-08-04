FROM php:8.2-apache

# Install required PHP extensions for Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql


# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www

# Copy everything to /var/www/laravel
COPY . /var/www/laravel

# Copy and set permissions for startup script
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Configure Apache to serve Laravel application
RUN echo '<VirtualHost *:80>\n\
    ServerName localhost\n\
    DocumentRoot /var/www/laravel/public\n\
    <Directory /var/www/laravel/public>\n\
        AllowOverride All\n\
        Require all granted\n\
        Options -Indexes\n\
    </Directory>\n\
    <Directory /var/www/laravel>\n\
        AllowOverride None\n\
        Require all denied\n\
    </Directory>\n\
    ErrorLog ${APACHE_LOG_DIR}/error.log\n\
    CustomLog ${APACHE_LOG_DIR}/access.log combined\n\
    LogLevel info\n\
    php_flag display_errors On\n\
    php_flag log_errors On\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Update Apache main configuration
RUN echo '\n\
<Directory /var/www/laravel/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# Set proper permissions
RUN chown -R www-data:www-data /var/www/laravel \
    && chmod -R 755 /var/www/laravel \
    && chmod -R 775 /var/www/laravel/storage \
    && chmod -R 775 /var/www/laravel/bootstrap/cache

# Create necessary directories if they don't exist
RUN mkdir -p /var/www/laravel/storage/logs \
    && mkdir -p /var/www/laravel/storage/framework/cache \
    && mkdir -p /var/www/laravel/storage/framework/sessions \
    && mkdir -p /var/www/laravel/storage/framework/views \
    && mkdir -p /var/www/laravel/storage/certificates \
    && chown -R www-data:www-data /var/www/laravel/storage

# Install Composer dependencies (only if vendor directory doesn't exist)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN if [ ! -d "/var/www/laravel/vendor" ]; then \
        cd /var/www/laravel && composer install --no-dev --optimize-autoloader; \
    fi

# Generate Laravel application key if .env doesn't exist
RUN cd /var/www/laravel && \
    if [ ! -f ".env" ]; then \
        cp .env.example .env && \
        php artisan key:generate; \
    fi



CMD ["/usr/local/bin/start.sh"]
