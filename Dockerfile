# Use PHP 8.3 with FPM
FROM php:8.3-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl unzip zip \
    libpng-dev libonig-dev libxml2-dev libzip-dev libsodium-dev libicu-dev \
    libpq-dev default-mysql-client libfreetype6-dev libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd zip sodium fileinfo

# Copy Composer from the official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ✅ Install Node.js + npm (LTS version 18)
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash && \
    apt-get update && apt-get install -y nodejs 

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install PHP dependencies (skip scripts to avoid DB connection errors)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Install and build frontend assets
RUN npm ci && npm run build

# Expose Laravel serve port
EXPOSE 8000

# Run migrations and start Laravel dev server
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
