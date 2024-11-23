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

# Keep the container running
tail -f /var/log/apache2/access.log /var/log/nginx/access.log
