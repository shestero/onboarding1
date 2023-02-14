FROM systemsdk/docker-apache-php-laravel

# see: https://magecomp.com/blog/laravel-8-create-application-programing-interface/#Step_1_Install_Laravel_8

# Arguments defined in docker-compose.yml
ARG user
ARG uid

RUN echo "Mutex posixsem" >> /etc/apache2/apache2.conf

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    wget

# Fix systemctl (from https://raw.githubusercontent.com/feo-cz/docker-systemctl-replacement/master/files/docker/systemctl3.py )
COPY systemctl3.py /usr/bin/systemctl.py
RUN chmod +x /usr/bin/systemctl.py && cp -f /usr/bin/systemctl.py /usr/bin/systemctl

# install Redis PHP extension
RUN echo ''|pecl install redis
RUN echo 'extension=/usr/local/lib/php/extensions/no-debug-non-zts-20220829/redis.so' > /usr/local/etc/php/conf.d/docker-php-ext-redis.ini
RUN /usr/sbin/apache2ctl restart

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Clear cache
# RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer require aws/aws-sdk-php

# Create system user to run Composer and Artisan Commands
#RUN useradd -G www-data,root -u $uid -d /home/$user $user
#RUN mkdir -p /home/$user/.composer && chown -R $user:$user /home/$user

RUN echo '<?php echo phpinfo(); ?>' > /var/www/html/public/pi.php

# Set working directory
WORKDIR /var/www

# starting services
# ENTRYPOINT /bin/sh -c "systemctl start apache2.service mariadb.service redis.service minio.service && tail -F /var/log/apache2/error.log"

#USER $user

