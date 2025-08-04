#!/bin/bash

# Navigate to Laravel directory
cd /var/www/laravel

# Create .env from .env.example if it doesn't exist
if [ ! -f ".env" ]; then
    cp .env.example .env
    echo "Created .env from .env.example"
fi

# Generate app key if not set
if ! grep -q "APP_KEY=base64:" .env; then
    php artisan key:generate --force
    echo "Generated new APP_KEY"
fi

# Cache configuration for better performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start Apache
exec apache2-foreground
