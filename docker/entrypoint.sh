#!/bin/sh

# Set permissions for the storage and cache directories
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Execute the original command (php-fpm)
exec "$@"
