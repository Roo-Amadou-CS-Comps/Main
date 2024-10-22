# Use an official Debian as a base image
FROM debian:bullseye
FROM nginx:latest

# Install Apache
RUN apt-get update && apt-get install -y apache2

# Copy the Apache configuration from your GitHub repo
COPY etc/apache2 /etc/apache2/

# Copy the website content from your GitHub repo to the Apache web root
COPY www/html /var/www/html/

# Open port 80 for web traffic
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2ctl", "-D", "FOREGROUND", "&&", "nginx", "-g", "daemon off;"]
