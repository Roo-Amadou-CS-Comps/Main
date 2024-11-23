#!/bin/bash

# Install Composer dependencies
echo "Checking for Composer..."
if ! command -v composer &> /dev/null; then
    echo "Composer not found. Installing Composer..."
    apt-get update && apt-get install -y wget php-cli unzip
    wget -O composer-setup.php https://getcomposer.org/installer
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer
fi

echo "Installing PHP dependencies..."
cd /var/www/html/loginProtect || exit 1
composer require whitehat101/apr1-md5
if [ $? -ne 0 ]; then
    echo "Failed to install Composer dependencies. Exiting."
    exit 1
fi

cd /var/www/html/evenmoreimportant || exit 1
composer require whitehat101/apr1-md5
if [ $? -ne 0 ]; then
    echo "Failed to install Composer dependencies. Exiting."
    exit 1
fi


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


# Set permissions for the vendor directory
echo "Setting permissions for the vendor directory..."
chmod -R 755 /var/www/html/loginProtect/vendor

# Keep the container running
echo "Startup complete. Tailing logs..."
tail -f /var/log/apache2/access.log /var/log/nginx/access.log

