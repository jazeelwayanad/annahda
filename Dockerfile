# ---------- Base Stage ----------
FROM php:8.3-fpm AS base

# Install PHP extensions & system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip zip nginx supervisor \
    libpng-dev libonig-dev libxml2-dev libzip-dev libsodium-dev libicu-dev \
    libpq-dev default-mysql-client libfreetype6-dev libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd zip sodium fileinfo

# Install Node.js (for Vite build)
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash && \
    apt-get update && apt-get install -y nodejs

# Copy composer binary
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ---------- Build Stage ----------
WORKDIR /var/www/html

# Copy dependencies first for caching
COPY package*.json ./
RUN npm ci

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Build frontend
RUN npm run build

# ---------- Configure Nginx + PHP-FPM ----------
COPY ./nginx.conf /etc/nginx/nginx.conf

# Supervisor manages both PHP and Nginx
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# (Remove the Artisan commands from build phase)
EXPOSE 8080

# Run Artisan commands safely at container start
CMD php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear && \
    /usr/bin/supervisord
