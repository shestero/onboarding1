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
    wget \
    redis  \
    mariadb-server 

# Fix systemctl (from https://raw.githubusercontent.com/feo-cz/docker-systemctl-replacement/master/files/docker/systemctl3.py )
COPY systemctl3.py /usr/bin/systemctl.py
RUN chmod +x /usr/bin/systemctl.py && cp -f /usr/bin/systemctl.py /usr/bin/systemctl

# install Redis PHP extension
RUN echo ''|pecl install redis
RUN echo 'extension=/usr/local/lib/php/extensions/no-debug-non-zts-20220829/redis.so' > /usr/local/etc/php/conf.d/docker-php-ext-redis.ini
RUN /usr/sbin/apache2ctl restart

# Redis server
#RUN wget https://github.com/FriendsOfPHP/pickle/releases/latest/download/pickle.phar
#RUN php pickle.phar install -n redis
#RUN rm pickle.phar

# MariaDB server
RUN mkdir /run/mysqld
RUN chmod 777 /run/mysqld

# Minio
RUN wget https://dl.min.io/server/minio/release/linux-amd64/archive/minio_20230131022419.0.0_amd64.deb -O minio.deb
RUN sudo dpkg -i minio.deb
RUN rm minio.deb
RUN mkdir /minio-data
RUN chmod 777 /minio-data
RUN echo 'MINIO_VOLUMES="/minio-data"' >> /etc/default/minio
RUN echo 'MINIO_ROOT_USER="minioadmin"' >> /etc/default/minio
RUN echo 'MINIO_ROOT_PASSWORD="minioadmin"' >> /etc/default/minio
RUN groupadd -r minio-user
RUN useradd -M -r -g minio-user minio-user
# to make custom build:
#RUN mkdir minio2
#RUN cd minio2
#RUN wget https://dl.min.io/server/minio/release/linux-amd64/minio
#RUN chmod +x minio
#RUN MINIO_ROOT_USER=admin MINIO_ROOT_PASSWORD=password ./minio server ./data --console-address :9001 &
#RUN cd ..

ENV AWS_ACCESS_KEY_ID=minioadmin
ENV AWS_SECRET_ACCESS_KEY=minioadmin
ENV AWS_DEFAULT_REGION=eu-west-1
ENV AWS_BUCKET=avatars
ENV AWS_URL=https://127.0.0.1:9000
ENV AWS_ENDPOINT=https://127.0.0.1:9000
ENV AWS_USE_PATH_STYLE_ENDPOINT=true

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

RUN composer create-project laravel/laravel Laravel && cd Laravel
# php artisan migrate # [ßyes]
# php artisan serve --host=0.0.0.0

# starting services
ENTRYPOINT /bin/sh -c "systemctl start mariadb.service redis.service minio.service && tail -F /var/log/apache2/error.log"

#USER $user

