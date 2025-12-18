#!/bin/bash
set -e

echo "Starting Laravel application setup..."

# Wait for database to be ready
echo "Waiting for database connection..."
until php -r "try { \$pdo = new PDO('pgsql:host=db;port=5432;dbname=hospitalms', 'hospitalms', 'password'); echo 'Database is ready\n'; exit(0); } catch (PDOException \$e) { exit(1); }" 2>/dev/null; do
    echo "Database is unavailable - sleeping"
    sleep 2
done

echo "Database is up - executing commands"

# Install composer dependencies
if [ ! -d "vendor" ]; then
    echo "Installing Composer dependencies..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

# Setup .env file
if [ ! -f ".env" ]; then
    echo "Creating .env file from .env.example..."
    cp .env.example .env 2>/dev/null || true
fi

# Generate application key if needed
if [ -f "artisan" ] && [ -d "vendor" ] && [ -f ".env" ]; then
    if ! grep -q "APP_KEY=base64:" .env 2>/dev/null; then
        echo "Generating application key..."
        php artisan key:generate --force || true
    fi
fi

# Set proper permissions (errors ignored for mounted volumes)
set +e
echo "Setting permissions..."
chown -R www-data:www-data /var/www/html 2>/dev/null || true
chmod -R 755 /var/www/html 2>/dev/null || true
if [ -d "/var/www/html/storage" ]; then
    chmod -R 775 /var/www/html/storage 2>/dev/null || true
fi
if [ -d "/var/www/html/bootstrap/cache" ]; then
    chmod -R 775 /var/www/html/bootstrap/cache 2>/dev/null || true
fi
set -e

# Optimize Laravel
if [ -f "artisan" ] && [ -d "vendor" ]; then
    echo "Optimizing Laravel..."
    php artisan config:clear || true
    php artisan cache:clear || true
    php artisan view:clear || true
    php artisan route:clear || true
fi

# Run migrations (optional - uncomment to enable)
# echo "Running database migrations..."
# php artisan migrate --force

echo "Laravel application setup completed!"

# Execute the main command
exec "$@"
