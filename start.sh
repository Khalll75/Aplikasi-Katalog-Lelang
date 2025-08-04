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

# Clear any cached config/routes/views to avoid conflicts
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Create storage link for public assets
php artisan storage:link

# Run database migrations (commented out - uncomment if needed)
# php artisan migrate --force

# Cache configuration for better performance (only if no errors)
if php artisan config:cache 2>/dev/null; then
    echo "Configuration cached successfully"
else
    echo "Warning: Could not cache configuration - check .env file"
fi

# Start Apache
exec apache2-foreground
