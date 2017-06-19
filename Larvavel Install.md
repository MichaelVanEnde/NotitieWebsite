#Project Webapplications

##Instaleren en Configureren van Laravel & Composer

###Composer
binnen halen van composer
```
sudo curl -sS https://getcomposer.org/installer | php
```
composer verplaatsen
```
sudo mv composer.phar /usr/local/bin/composer
```
rechten aanpassen zodat we composer kunnen uitvoeren
```
sudo chmod +x /usr/local/bin/composer
```

###Instaleren Laravel
install instructie
```
composer global require laravel/installer
```
(Zip instaleren wanneer nodig)
```
sudo apt-get install zip
```

laravel project aan maken 
```
composer create-project laravel/laravel NaamProject
```
maakt een project aan met NaamProject in de huidige directory

###Default directory aanpassen webserver
Default user rechten geven
```
sudo chown -R www-data:www-data /var/www
```
Directory veranderen doe je in dedefaul.conf file
```
sudo nano /etc/apache2/sites-available/000-default.conf
```
Verander de directory van DocumentRoot
Aanpassen van permisies van project mappen
```
sudo chown www-data:www-data /var/www/NaamProject/storage
ssudo chown www-data:www-data /var/www/NaamProject/vendor
```