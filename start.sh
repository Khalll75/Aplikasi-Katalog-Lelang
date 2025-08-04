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

# Test database connection before running migrations
echo "Testing database connection..."
if php artisan db:show --database=mysql 2>/dev/null; then
    echo "Database connection successful"

    # Run migrations if database is accessible
    php artisan migrate --force
    echo "Database migrations completed"
else
    echo "Warning: Database connection failed - switching to file-based sessions and cache"

    # Temporarily switch to file-based sessions and cache if database is not available
    sed -i 's/SESSION_DRIVER=database/SESSION_DRIVER=file/' .env
    sed -i 's/CACHE_STORE=database/CACHE_STORE=file/' .env
    sed -i 's/QUEUE_CONNECTION=database/QUEUE_CONNECTION=sync/' .env
fi

# Cache configuration for better performance (only if no errors)
if php artisan config:cache 2>/dev/null; then
    echo "Configuration cached successfully"
else
    echo "Warning: Could not cache configuration - check .env file"
fi

# Start Apache
exec apache2-foreground
