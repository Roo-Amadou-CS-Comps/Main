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

# Install dependencies for loginProtect
echo "Installing dependencies for /var/www/html/loginProtect..."
cd /var/www/html/loginProtect || exit 1
if [ ! -f vendor/autoload.php ]; then
    composer require whitehat101/apr1-md5
else
    echo "Dependencies already installed for /var/www/html/loginProtect."
fi

# Install dependencies for evenmoreimportant
echo "Installing dependencies for /var/www/html/evenmoreimportant..."
cd /var/www/html/evenmoreimportant || exit 1
if [ ! -f vendor/autoload.php ]; then
    composer require whitehat101/apr1-md5
else
    echo "Dependencies already installed for /var/www/html/evenmoreimportant."
fi

# Return to root
cd /

# Set permissions for both directories
echo "Setting permissions for vendor directories..."
chmod -R 755 /var/www/html/loginProtect/vendor
chmod -R 755 /var/www/html/evenmoreimportant/vendor

# Keep the container running or drop into an interactive shell
if [ "$1" != "interactive" ]; then
    echo "Startup complete."
    # Start log tailing in the background
    tail -f /var/log/apache2/access.log /var/log/nginx/access.log &
    # Wait indefinitely to keep the container running
    while true; do
        sleep 3600
    done
else
    echo "Dropping into an interactive shell..."
    exec /bin/bash
fi
