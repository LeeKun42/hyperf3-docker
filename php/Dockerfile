FROM php:8.2.7-cli-alpine3.18

#更换阿里云镜像源
RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories
RUN apk update --no-cache
RUN apk add --no-cache tzdata

#安装依赖
RUN apk add --no-cache autoconf \
    openssl-dev \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    libpq \
    zlib-dev \
    curl \
    iputils \
    sudo \
    libzip-dev \
    gcc \
    g++ \
    make \
    libpq-dev \
    c-ares-dev \
    curl-dev

#安装扩展
# gd
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && docker-php-ext-install -j$(nproc) gd bcmath zip pdo_mysql opcache
# redis
RUN yes no | pecl install redis && docker-php-ext-enable redis
# pcntl
RUN docker-php-ext-configure pcntl --enable-pcntl && docker-php-ext-install pcntl
# swoole
RUN yes "" | pecl install --configureoptions \
    'enable-openssl="yes" enable-mysqlnd="yes" enable-curl="yes" enable-cares="yes" enable-http2="yes" enable-swoole-json="no" enable-swoole-curl="yes"' \
    swoole-5.1.1 \
    && docker-php-ext-enable swoole

#安装php composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php
RUN mv composer.phar /usr/local/bin/composer && chmod 777 /usr/local/bin/composer
RUN composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/

RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini \
    && sed -i 's/;date.timezone =/date.timezone = PRC/' /usr/local/etc/php/php.ini \
    && sed -i 's/expose_php = On/expose_php = Off/' /usr/local/etc/php/php.ini \
    && sed -i 's/;opcache.enable_cli=0/opcache.enable_cli=1/' /usr/local/etc/php/php.ini \
    && sed -i 's/post_max_size = 8M/post_max_size = 128M/' /usr/local/etc/php/php.ini \
    && sed -i 's/memory_limit = 128M/memory_limit = 1024M/' /usr/local/etc/php/php.ini \
    && sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 512M/' /usr/local/etc/php/php.ini \
    && sed -i 's/max_execution_time = 30/max_execution_time = 300/' /usr/local/etc/php/php.ini \
    && echo 'swoole.use_shortname=Off' >> /usr/local/etc/php/php.ini

#添加用户组和用户设置sudo权限
RUN addgroup -S -g 1000 lijun
RUN adduser -S -G lijun -u 1000 lijun
RUN echo 'lijun:331233' | chpasswd
RUN echo "lijun ALL=(ALL) ALL" >> /etc/sudoers.d/lijun
User lijun

WORKDIR /opt/www/