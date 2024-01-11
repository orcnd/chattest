FROM php:8.1-apache

RUN apt-get update
RUN apt-get install --yes --force-yes cron g++ gettext libicu-dev openssl libc-client-dev libkrb5-dev libxml2-dev libfreetype6-dev libgd-dev libmcrypt-dev bzip2 libbz2-dev libtidy-dev libcurl4-openssl-dev libz-dev libmemcached-dev libxslt-dev 

RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql

RUN a2enmod rewrite

RUN docker-php-ext-install mysqli 
RUN docker-php-ext-enable mysqli


RUN docker-php-ext-configure gd --with-freetype=/usr --with-jpeg=/usr
RUN docker-php-ext-install gd

RUN echo 'SetEnv MYSQL_HOST ${MYSQL_HOST}' > /etc/apache2/conf-enabled/environment.conf
RUN echo 'SetEnv MYSQL_USER ${MYSQL_USER}' > /etc/apache2/conf-enabled/environment.conf

RUN echo 'SetEnv MYSQL_PASS ${MYSQL_PASS}' > /etc/apache2/conf-enabled/environment.conf

RUN echo 'SetEnv MYSQL_DB ${MYSQL_DB}' > /etc/apache2/conf-enabled/environment.conf
