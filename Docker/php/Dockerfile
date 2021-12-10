FROM php:8.0.2-cli

# Update
RUN apt-get -y update --fix-missing && \
    apt-get upgrade -y && \
    apt-get --no-install-recommends install -y apt-utils && \
    rm -rf /var/lib/apt/lists/*

# Install Linux Dependencies
RUN apt-get -y update && apt-get -y --no-install-recommends install \
    zlib1g-dev \
    libpng-dev \
    libzip-dev

# Install PHP Extensions
RUN docker-php-ext-install gd zip

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ARG user
ARG uid

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

WORKDIR /code

USER $user