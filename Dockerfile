# --- Stage 1: Build frontend (Node + Tailwind + Vite) ---
FROM node:20-alpine as nodebuilder

# Set working directory
WORKDIR /app

# Copy package files and Vite config
COPY package*.json vite.config.js tailwind.config.js postcss.config.js ./

# Install dependencies (Tailwind + Vite)
RUN npm ci

# Copy frontend source code
COPY resources ./resources
COPY public ./public
COPY app ./app
COPY vendor ./vendor

# Build Tailwind + Vite assets
RUN npm run build


# --- Stage 2: PHP + Laravel ---
FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip zip \
    libpng-dev libonig-dev libxml2-dev libzip-dev libsodium-dev libicu-dev \
    libpq-dev default-mysql-client libfreetype6-dev libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd zip sodium fileinfo

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy app files
COPY . .

# Copy built frontend assets from Node builder
COPY --from=nodebuilder /app/public/build ./public/build

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Cache config + optimize
RUN php artisan config:cache || true

# Expose Laravel port
EXPOSE 8080

# Start Laravel with migrations + seeding (safely)
CMD php artisan migrate --force && \
    php artisan db:seed --force && \
    php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
