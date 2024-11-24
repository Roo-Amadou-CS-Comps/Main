# Server for RASpray Attacks
For Carleton College CS Comps, F24

This folder contains most of the `/etc/` and `/var/` folders in our AWS server that relate to Apache, nginx, and the HTML/PHP pages for our website that we used to test RASpray. 

## How To Run
**We have set up a dockerized verison of this server, available in the branch `DockerServerVersion`. Instructions and a packaged release exist in that branch.**

In order to directly imitate our setup, you'll want an instance of Debian 12. We ran ours in an Amazon Web Services' Lightsail container, but EC2 or a local installation should also work. 

Before cloning, run the following command:
```
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
    nginx \
    lynx \
    net-tools \
    unzip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*
```

Some of these tools may come preinstalled (`net-tools`, for example, is fairly common, but doesn't come default in all distros of Debian). 

After this, copy (overwrite using `cp `) the contents of the `website ` folder into their respective folders:

```
cp -r ./website/etc/* /etc/
cp -r ./website/www/html/* /var/www/html/
```

After this, you can start Apache and nginx:
```
systemctl start apache2
systemctl start nginx
```

Apache will run on port 8080, nginx will run on port 80. nginx is running as a rate limiter, so that Apache doesn't get overloaded by requests. 

## Common issues
### Apache or nginx won't start
Generally, when this happens, it means there's been some configuration error. Delete `/etc/apache2` and `/etc/nginx` and copy over the contents of this repository again. 
You can run the following commands to test the configurations of nginx and Apache:

```
nginx -t #Tests nginx configuration
apachectl configtest #Tests apache configuration
```

### html/evenmoreimportant/ or html/loginProtect/ throws PHP errors
This is likely a dependency issues. 
1. We are using a seperate installed library, which requires `composer`. It should already be installed, but just to make sure, run
```
composer --version
```
2. If composer is not found/not installed, run:
```
apt-get update && apt-get install -y wget php-cli unzip
wget -O composer-setup.php https://getcomposer.org/installer
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
```
3. Go to the directory where loginProtect PHP files are located:
```
cd /var/www/html/loginProtect
```
4. Install whitehat101/apr1-md5 Run Composer to install the required package:
```
composer require whitehat101/apr1-md5
```
5. Repeat the same process for `html/evenmoreimportant`.

## Other errors
Please report other errors you find. 

## License

The server-specific code, configuration, and other elements fall under the GNU GPL license, unless specified otherwise. Apache is under the Apache License, and nginx is under the FreeBSD License. 

## Contributors

- **Amadou Touré** '25, Carleton College. [tourea@carleton.edu](mailto:tourea@carleton.edu)
- **Roo Case** '25, Carleton College. [caser@carleton.edu](mailto:caser@carleton.edu)
