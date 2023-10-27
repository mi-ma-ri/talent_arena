FROM php:8.2-apache

# apt install iputils-ping net-tools で ping を導入
RUN apt-get update \
 && apt-get install -y libgmp-dev zlib1g-dev libzip-dev unzip vim iputils-ping net-tools sudo\
 && docker-php-ext-install zip gmp

# a2emod rewrite をして apache に rewrite モジュールを追加
# これをしないと Laravel でルート以外にアクセスできない
RUN a2enmod rewrite

# docker php には mysql 用のドライバが未インストールのため追加する
RUN docker-php-ext-install pdo_mysql

ENV COMPOSER_ALLOW_SUPERUSER 1

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ADD docker/php/php.ini /usr/local/etc/php/
ADD docker/php/000-default.conf /etc/apache2/sites-enabled/

WORKDIR /var/www/html

COPY ../../ /var/www/html

RUN mkdir -p /var/www/html/storage
RUN chown www-data:www-data /var/www/html/storage -R
