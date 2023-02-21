FROM systemsdk/docker-apache-php-laravel AS base

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev 

# Fix systemctl (from https://raw.githubusercontent.com/feo-cz/docker-systemctl-replacement/master/files/docker/systemctl3.py )
#COPY systemctl3.py /usr/bin/systemctl.py
#RUN chmod +x /usr/bin/systemctl.py && cp -f /usr/bin/systemctl.py /usr/bin/systemctl

# install Redis PHP extension
RUN echo ''|pecl install redis && docker-php-ext-enable redis
#RUN echo 'extension=/usr/local/lib/php/extensions/no-debug-non-zts-20220829/redis.so' > /usr/local/etc/php/conf.d/docker-php-ext-redis.ini
RUN echo "Mutex posixsem" >> /etc/apache2/apache2.conf
RUN /usr/sbin/apache2ctl restart
# ^ check if it ever can start

# Install PHP extensions
#RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
RUN docker-php-ext-install pdo_mysql 
#RUN docker-php-ext-install mbstring 
#RUN docker-php-ext-install exif 
#RUN docker-php-ext-install pcntl 
#RUN docker-php-ext-install gd


# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer require aws/aws-sdk-php
RUN composer require laravel/fortify
RUN composer require laravel/breeze --dev

WORKDIR /var/www/html

FROM base AS dev
# Install system dependencies
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    curl \
    wget \
    mariadb-client \
    locate \
    vim

RUN composer require laravel/pint --dev
RUN composer global require friendsofphp/php-cs-fixer

#RUN composer require stechstudio/laravel-php-cs-fixer 
# Error: Class "ECSPrefix202302\Symfony\Component\Console\Command\Command" not found

RUN echo '<?php echo phpinfo(); ?>' > /var/www/html/public/pi.php

#RUN echo 'xdebug.remote_host=host.docker.internal' >> /usr/local/etc/php/conf.d/xdebug.ini  # for old XDebug
RUN echo 'xdebug.client_host=host.docker.internal' >> /usr/local/etc/php/conf.d/xdebug.ini
RUN /usr/sbin/apache2ctl restart
# ^ check if it ever can start

# Node.Js in app container
#RUN curl -sL https://deb.nodesource.com/setup_14.x | sudo bash -
#RUN sudo apt -y install nodejs yarn    
#RUN npm install
# npm run dev
# see: https://stackoverflow.com/questions/73631193/how-to-expose-vite-js-host-to-the-outside-docker/73697215#73697215

# starting services (run all in single container):
# ENTRYPOINT /bin/sh -c "systemctl start apache2.service mariadb.service redis.service minio.service && tail -F /var/log/apache2/error.log"

FROM base AS prod

# turn XDebug off
RUN echo 'xdebug.remote_autostart=0' > /usr/local/etc/php/conf.d/xdebug.ini
RUN echo 'xdebug.remote_enable=0'   >> /usr/local/etc/php/conf.d/xdebug.ini
RUN echo 'xdebug.profile_enable=0'  >> /usr/local/etc/php/conf.d/xdebug.ini
#RUN apt-get update && apt-get install -y php-common
#RUN sudo phpdismod xdebug

# Init database (!)
#RUN DB_HOST=db php artisan migrate

# Clear cache
#RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy files
COPY html /var/www/html

