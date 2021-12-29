FROM php:7.2-fpm

WORKDIR /var/www
RUN apt-get update && apt-get install -y \
            curl \
            wget \
            git \
            libfreetype6-dev \
            libjpeg62-turbo-dev \
    	libpng-dev \
    	libonig-dev \
    	libzip-dev \
    	libmcrypt-dev \
            && pecl install mcrypt \
    	&& docker-php-ext-enable mcrypt \
            && docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql zip \
    	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
            && docker-php-ext-install -j$(nproc) gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
COPY . /var/www

EXPOSE 9000
COPY test.sh /test.sh
RUN  chmod +x /test.sh
CMD ["/test.sh"]
