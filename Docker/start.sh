#!/bin/bash

# Start Apache
echo "Starting Apache..."
service apache2 restart
if [ $? -ne 0 ]; then
    echo "Failed to start Apache. Exiting."
    exit 1
fi

# Start Nginx
echo "Starting Nginx..."
service nginx restart
if [ $? -ne 0 ]; then
    echo "Failed to start Nginx. Exiting."
    exit 1
fi

# Check for Composer and dependencies
echo "Checking Composer dependencies in /var/www/html/loginProtect..."
cd /var/www/html/loginProtect || exit 1

# Verify vendor/autoload.php exists
if [ ! -f vendor/autoload.php ]; then
    echo "Vendor directory or autoload.php missing. Generating autoload files..."
    composer dump-autoload
fi

# Verify whitehat101/apr1-md5 package is installed
if ! grep -q "whitehat101/apr1-md5" composer.lock; then
    echo "Installing whitehat101/apr1-md5..."
    composer require whitehat101/apr1-md5
else
    echo "whitehat101/apr1-md5 is already installed."
fi

# Set permissions
echo "Setting permissions for vendor directory..."
chmod -R 755 vendor

# Keep the container running
echo "Startup complete. Tailing logs..."
tail -f /var/log/apache2/access.log /var/log/nginx/access.log
