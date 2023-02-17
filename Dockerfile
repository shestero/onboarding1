FROM systemsdk/docker-apache-php-laravel AS base

FROM base AS builder

# RUN echo "Mutex posixsem" >> /etc/apache2/apache2.conf

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    wget \
    mariadb-client \
    locate vim

# Fix systemctl (from https://raw.githubusercontent.com/feo-cz/docker-systemctl-replacement/master/files/docker/systemctl3.py )
#COPY systemctl3.py /usr/bin/systemctl.py
#RUN chmod +x /usr/bin/systemctl.py && cp -f /usr/bin/systemctl.py /usr/bin/systemctl

# install Redis PHP extension
RUN echo ''|pecl install redis
RUN echo 'extension=/usr/local/lib/php/extensions/no-debug-non-zts-20220829/redis.so' > /usr/local/etc/php/conf.d/docker-php-ext-redis.ini
RUN /usr/sbin/apache2ctl restart

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer require aws/aws-sdk-php
RUN composer require laravel/fortify
RUN composer require laravel/breeze --dev

# Node.Js
RUN curl -sL https://deb.nodesource.com/setup_14.x | sudo bash -
RUN sudo apt -y install nodejs yarn    
RUN npm install
# npm run dev
# see: https://stackoverflow.com/questions/73631193/how-to-expose-vite-js-host-to-the-outside-docker/73697215#73697215

# Clear cache
# RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN echo '<?php echo phpinfo(); ?>' > /var/www/html/public/pi.php

# Set working directory
WORKDIR /var/www/html

# starting services (single container):
# ENTRYPOINT /bin/sh -c "systemctl start apache2.service mariadb.service redis.service minio.service && tail -F /var/log/apache2/error.log"


