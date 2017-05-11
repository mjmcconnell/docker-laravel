FROM ubuntu:16.04
MAINTAINER Mark McConnell <mjmcconnell.dev@gmail.com>

# keep upstart quiet
RUN dpkg-divert --local --rename --add /sbin/initctl
RUN ln -sf /bin/true /sbin/initctl

# no tty
ENV DEBIAN_FRONTEND noninteractive

# Get up to date and install nginx, php and php packages
RUN apt-get update --fix-missing && apt-get install -y \
    build-essential \
    curl \
    git \
    php-pear \
    php-dom \
    php-mbstring \
    php-fpm \
    php-mcrypt \
    php-curl \
    php-cli \
    php-gd \
    php-pgsql \
    php-common \
    php-json \
    php7.0-zip \
    zip \
    unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/
RUN mv /usr/bin/composer.phar /usr/bin/composer

RUN useradd -ms /bin/bash docker
USER docker
WORKDIR /app
