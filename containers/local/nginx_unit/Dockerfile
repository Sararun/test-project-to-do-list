FROM unit:1.33.0-php8.3

ARG UID=1000
ARG GID=1000
ENV UID=${UID}
ENV GID=${GID}

# Create non root user
RUN addgroup --gid $GID laravel \
    && adduser --uid $UID --gid $GID --shell /bin/bash --home /home/laravel/ laravel

#usefull for dev
COPY ./sources.list /etc/apt/sources.list

# Install dependencies
RUN apt-get update && apt-get install -y \
    libicu-dev \
    vim \
    autoconf \
    curl \
    git \
    unzip \
    wget \
    zip \
    g++ \
    gnupg \
    locales \
    build-essential \
    jpegoptim optipng pngquant gifsicle \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
	libpng-dev \
    libwebp-dev \
    libonig-dev \
	libzip-dev \
    libxpm-dev \
    libmcrypt-dev \
    libpq-dev \
    htop \
    && apt clean  \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* /var/www/html/* \
    && ln -sf /dev/stdout /var/log/unit.log

# Install extensions
RUN docker-php-ext-install zip exif pcntl opcache sockets \
	&& docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_pgsql \
    && docker-php-ext-install bcmath \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl


# ---- COMPOSER ----
COPY --from=composer:2.8.5 /usr/bin/composer /usr/local/bin/composer

# Create work directory
WORKDIR /var/www/html
RUN chown -R laravel:laravel /var/www/html && chmod -R 777 /var/www/html

# PHP configuration
COPY ./php/*.ini /usr/local/etc/php/conf.d/

ENV TZ=Europe/Moscow
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
