# THIS DOCKERFILE IS FOR THE WEBSITE AND APACHE SERVER. 
# Base image
FROM debian:latest

# Install required packages
RUN apt-get update && \
    apt-get install -y \
    git \
    apache2 \
    libapache2-mod-evasive \
    php8.2 \
    libapache2-mod-php8.2 \
    php-cli \
    php-mysql \
    php-curl \
    php-mbstring \
    wget \
    systemd \
    nginx \
    lynx \
    nano \
    net-tools \
    unzip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Configure Nginx to listen on port 80 and proxy to Apache on port 8080
RUN sed -i 's/listen 80 default_server;/listen 80;/' /etc/nginx/sites-available/default && \
    sed -i 's|location / {|location / {\n\tproxy_pass http://localhost:8080;\n\tproxy_set_header Host $host;\n\tproxy_set_header X-Real-IP $remote_addr;\n|' /etc/nginx/sites-available/default

# Clone repository from GitHub
RUN git clone https://github.com/Roo-Amadou-CS-Comps/Main.git /app

# Ensure the /etc/apache2 directory exists before copying
RUN mkdir -p /etc/apache2

# Copy Apache configuration and website files
RUN cp -r /app/website/etc/* /etc/ && \
    cp -r /app/website/www/html/* /var/www/html/

# Install Composer globally
RUN wget -O composer-setup.php https://getcomposer.org/installer && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php

# Set working directory
WORKDIR /var/www/html/loginProtect

# Ensure PHP dependencies are installed
RUN composer install

# Ensure vendor/autoload.php exists and whitehat101/apr1-md5 is installed
RUN if [ ! -f vendor/autoload.php ]; then composer dump-autoload; fi && \
    composer require whitehat101/apr1-md5

# Set permissions for the vendor directory
RUN chmod -R 755 /var/www/html/loginProtect/vendor

# Enable Apache and Nginx ports
EXPOSE 80
EXPOSE 8080

# Copy the startup script
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Command to start both services
CMD ["/start.sh"]
