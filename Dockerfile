# THIS DOCKERFILE IS FOR THE WEBSITE AND APACHE SERVER. 
# Base image
FROM debian:latest

# Install git and apache2
# also installs apache2 extensions and PHP
RUN apt-get update && \
    apt-get install -y git apache2 libapache2-mod-evasive php8.2 libapache2-mod-php8.2 && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Clone repository from GitHub
RUN git clone https://github.com/Roo-Amadou-CS-Comps/Main.git /app

# Ensure the /etc/apache2 directory exists before copying
RUN mkdir -p /etc/apache2

# Copy the contents of etc/apache2 to /etc/apache2 in the container using `cp`
RUN cp -r /app/website/etc/apache2/* /etc/apache2/

# Copy the contents of www/html to /var/www/html in the container
RUN cp -r /app/website/www/html/* /var/www/html/

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apachectl", "-D", "FOREGROUND"]

