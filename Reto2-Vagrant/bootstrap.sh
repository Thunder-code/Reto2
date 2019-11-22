#!/usr/bin/env bash

echo "Actualizando paquetes" | boxes

sudo apt-get update

# unzip is for composer
sudo apt-get install vim unzip  -y

sudo apt-get install apache2 -y

sudo apt-get install mysql-client libmysqlclient-dev -y
sudo apt-get install libapache2-mod-php7.2 php7.2 php7.2-mysql sudo php7.2-sqlite -y
sudo apt-get install php7.2-mbstring php7.2-curl php7.2-intl 
sudo php7.2-gd php7.2-zip php7.2-bz2 -y
sudo apt-get install php7.2-dom php7.2-xml php7.2-soap -y
sudo apt-get install --reinstall ca-certificates -y

# install the php xdebug extension (only for dev servers!)
sudo apt-get install php-xdebug -y

# add xdebug settings to php.ini
echo 'xdebug.remote_port=9000' >> /etc/php/7.2/apache2/php.ini
echo 'xdebug.remote_enable=true' >> /etc/php/7.2/apache2/php.ini
echo 'xdebug.remote_connect_back=true' >> /etc/php/7.2/apache2/php.ini
echo 'xdebug.remote_autostart=on' >> /etc/php/7.2/apache2/php.ini
echo 'xdebug.remote_host=' >> /etc/php/7.2/apache2/php.ini
echo 'xdebug.max_nesting_level=1000' >> /etc/php/7.2/apache2/php.ini
echo 'xdebug.idekey=PHPSTORM' >> /etc/php/7.2/apache2/php.ini

# Enable apache mod_rewrite
sudo a2enmod rewrite
sudo a2enmod actions

# Change AllowOverride from None to All (between line 170 and 174)
sudo sed -i '170,174 s/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Start the webserver
sudo service apache2 restart

# Install MySQL (optional)
sudo apt-get install mysql-server -y

# Change mysql root password
sudo service mysql start
mysql -u root --password="" -e "update mysql.user set authentication_string=password(''), plugin='mysql_native_password' where user='root';"
mysql -u root --password="" -e "flush privileges;"

# Install composer
sudo cd ~
sudo php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
sudo php -r "unlink('composer-setup.php');"
sudo composer self-update

# Create a symlink
sudo rm -rf /var/www
sudo mkdir /var/www
sudo ln -s /vagrant/ /var/www/html
